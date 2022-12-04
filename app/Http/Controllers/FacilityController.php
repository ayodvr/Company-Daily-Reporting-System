<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App;
use Carbon\Carbon;
use App\Models\Facility;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities =  Activity::orderBy('created_at','DESC')->paginate(7);
        $user_id = auth()->user()->id;
        $sales = Facility::all()->groupBy(function ($store_name) {
            $all_stores = $store_name->store_id;
                return $all_stores;
        })->map(function ($item) {
            return [
                "records" => $item->toArray(),
                "stores"   => $item[0]['store_id'],
              ];
        });

            $store_arr = [];
            $staff_arr = [];
            foreach($sales as $key => $value){
                if(Auth::user()->hasRole('admin')){
                    array_push($store_arr,$key);
                }if(Auth::user()->hasRole('staff') && $value['records'][0]['user_id'] == $user_id){
                    array_push($staff_arr,$key);
                }
            }


        return view("facility.report")->with('store_arr', $store_arr)
                                    ->with('staff_arr', $staff_arr)
                                    ->with('activities', $activities);
    }

    public function store_report($store_report)
    {
        $activities =  Activity::orderBy('created_at','DESC')->paginate(7);
        $report_arr = Facility::where('store_id', str_replace('_', ' ', $store_report))->get()->groupBy(function ($date) {
                return $date->created_at->format('Y-m-d');
        })->map(function ($item) {
            return $item;
        });

        //dd($report_arr);
        $facility_arr1 = [];

        foreach($report_arr as $key => $value){
            if(isset($key)){
                array_push($facility_arr1,$value[0]['store_id']);
            }
        }

        //dd($facility_arr1);

        return view("facility.daily_report")->with('facility_arr', $facility_arr1[0])
                                            ->with('store_report', $store_report)
                                            ->with('activities', $activities);
    }


    public function ExportExcel($customer_data){

        ini_set('max_execution_time', 0);

        ini_set('memory_limit', '4000M');




        try {

            $spreadSheet = new Spreadsheet();

            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);

            $spreadSheet->getActiveSheet()->fromArray($customer_data);




            $Excel_writer = new Xls($spreadSheet);

            header('Content-Type: application/vnd.ms-excel');

            header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');

            header('Cache-Control: max-age=0');

            ob_end_clean();

            $Excel_writer->save('php://output');

            exit();

        } catch (Exception $e) {

            return;

        }
    }

    public function downloadExcelTemplate($date_created, $store_location)
    {
        $activities =  Activity::orderBy('created_at','DESC')->paginate(7);
        $sales_arr = Facility::where('today_date', $date_created)->get();
        //dd($sales_arr);
        $report_arr = [];
        $report_key = [];

        foreach($sales_arr as $key => $value){
            if(str_replace(' ','_', $value['store_id']) == $store_location){
                array_push($report_arr, $value);
                array_push($report_key, $key);
            }
        }

        $data_array [] = array("ITEM DETAILS","AVAILABILITY","STATUS","CONDITION","COMMENTS");

        foreach($report_arr as $data_item)
        {
            $data_array[] = array(
                'ITEM DETAILS'             => $data_item['item_details'],
                'AVAILABILITY'             => $data_item['availability'],
                'STATUS'                   => $data_item['status'],
                'CONDITION'                => $data_item['condition'],
                'COMMENTS'                 => $data_item['comments']
            );
        }

        $this->ExportExcel($data_array);

    }

    public function fetch_records(Request $request)
    {
        $activities =  Activity::orderBy('created_at','DESC')->paginate(7);
        $sales_arr = Facility::where('today_date', $request->date)->get();
        //dd($sales_arr);
        $report_arr = [];
        $report_key = [];

        foreach($sales_arr as $key => $value){
            if(str_replace(' ','_', $value['store_id']) == $request->store){
                array_push($report_arr, $value);
                array_push($report_key, $key);
            }
        }

        //dd($report_arr);

        if(!empty($report_arr)){
            return view("facility.report_detail")->with('record_arr', $report_arr)
                                             ->with('t_date', $report_arr[0]['today_date'])
                                             ->with('t_store', $report_arr[0]['store_id'])
                                             ->with('report_id', $report_arr[0]['id'])
                                             ->with('fac_Serial', $report_arr[0]['store_serial'])
                                             ->with('activities', $activities);
        }else{

            notify()->error("No report found for selected date!","");

            return back();
        }



    }

    public function generate_pdf($report_key, $store_location)
    {
        $sales_arr = Facility::where('today_date', $report_key)->get();

        $report_arr = [];
        $report_key = [];

        foreach($sales_arr as $key => $value){
            if(str_replace(' ','_', $value['store_id']) == $store_location){
                array_push($report_arr, $value);
                array_push($report_key, $key);
            }
        }

        //dd($report_arr);

        $filename = 'facility_report.pdf';

        $mpdf = new \Mpdf\Mpdf();

        $html = \View::make('facility.pdf')->with('record_arr', $report_arr)
                                           ->with('t_date', $report_arr[0]['created_at'])
                                           ->with('t_store', $report_arr[0]['store_id'])
                                           ->with('fac_Serial', $report_arr[0]['store_serial']);
        $html = $html->render();

        $mpdf->setFooter('Dreamworks Integrated Systems');
        $mpdf->SetWatermarkImage('assets/luma/img/img003.png');
        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename,'I');
    }

    public function download_pdf($report_key, $store_location)
    {
        $sales_arr = Facility::where('today_date', $report_key)->get();

        $report_arr = [];
        $report_key = [];

        foreach($sales_arr as $key => $value){
            if(str_replace(' ','_', $value['store_id']) == $store_location){
                array_push($report_arr, $value);
                array_push($report_key, $key);
            }
        }

        //dd($report_arr);

        $filename = 'facility_report.pdf';

        $mpdf = new \Mpdf\Mpdf();

        $html = \View::make('facility.pdf')->with('record_arr', $report_arr)
                                           ->with('t_date', $report_arr[0]['created_at'])
                                           ->with('t_store', $report_arr[0]['store_id'])
                                           ->with('fac_Serial', $report_arr[0]['store_serial']);
        $html = $html->render();

        $mpdf->setFooter('Dreamworks Integrated Systems');
        $mpdf->SetWatermarkImage('assets/luma/img/img003.png');
        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename,'D');
    }

    public function send_pdf(Request $request ,$report_key, $store_location)
    {
        $data = [
            'email'     => $request->get('email'),
            'subject'   => $request->get('subject'),
            'body'      => $request->get('body')
        ];

        $sales_arr = Facility::where('today_date', $report_key)->get();

        $report_arr = [];
        $report_key = [];

        foreach($sales_arr as $key => $value){
            if(str_replace(' ','_', $value['store_id']) == $store_location){
                array_push($report_arr, $value);
                array_push($report_key, $key);
            }
        }

        //dd($report_arr);

        // $filename = 'facility_report.pdf';

        $serial = random_int(10, 99);
        $filename = 'DW'.'-'. $serial .'-'. 'facility-report.pdf';

        $mpdf = new \Mpdf\Mpdf();

        $html = \View::make('facility.pdf')->with('record_arr', $report_arr)
                                           ->with('t_date', $report_arr[0]['created_at'])
                                           ->with('t_store', $report_arr[0]['store_id'])
                                           ->with('fac_Serial', $report_arr[0]['store_serial']);
        $html = $html->render();

        $mpdf->setFooter('Dreamworks Integrated Systems');
        $mpdf->SetWatermarkImage('assets/luma/img/img003.png');
        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML(utf8_encode($html));
        $mpdf->Output('Facility'.'/'.$filename,'F');

        $file = public_path().'/'.'Facility'.'/' . $filename;

            \Mail::send('emails.sendReport',array(
                'body' => $data['body']
            ),function($message) use ($data, $file) {
                foreach($data['email'] as $email){
                    $message->to($email)
                        ->subject($data["subject"])
                        ->attach($file);
                }
            });

        return back()->with('success', 'Report successfully sent!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities =  Activity::orderBy('created_at','DESC')->paginate(7);
        return view('facility.create')->with('activities', $activities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'item_details' => $request->get('details'),
            'availability' => $request->get('availability'),
            'status'       => $request->get('status'),
            'condition'    => $request->get('condition'),
            'comments'     => $request->get('comments')
        ];

        $array_length = is_array($data["item_details"]) ? count($data["item_details"]) : 1;
        $array_length = is_array($data["availability"]) ? count($data["availability"]) : 1;
        $array_length = is_array($data["status"])       ? count($data["status"])       : 1;
        $array_length = is_array($data["condition"])    ? count($data["condition"])    : 1;
        $array_length = is_array($data["comments"])     ? count($data["comments"])     : 1;

        $anytime = Carbon::now();
        $today_date = $anytime->format('Y-m-d');

        $serial = random_int(1000, 9999);
        $store_name = Store::where('store_name', auth()->user()->store)->first();
        $store_abrv = substr($store_name['store_name'], 3, 3);
        $store_isbn = 'DW' . strtoupper($store_abrv) . $serial . 'FAC';

        if($array_length ==  1){
            $save_one_rec = array();
            for($x = 0; $x < $array_length; $x++ ){
                $arr_item = array(
                    "item_details" => $data["item_details"][$x],
                    "availability" => $data["availability"][$x],
                    "status"       => $data["status"][$x],
                    "condition"    => $data["condition"][$x],
                    "comments"     => $data["comments"][$x],
                );

                array_push($save_one_rec ,$arr_item);

                $facility = new Facility;
                $facility->item_details = $save_one_rec[0]['item_details'];
                $facility->availability = $save_one_rec[0]['availability'];
                $facility->status       = $save_one_rec[0]['status'];
                $facility->condition    = $save_one_rec[0]['condition'];
                $facility->comments     = $save_one_rec[0]['comments'];
                $facility->user_id      = auth()->user()->id;
                $facility->store_id     = auth()->user()->store;
                $facility->today_date   = $today_date;
                $facility->store_serial = $store_isbn;

                $facility->save();
            }

        }else if($array_length >  1){
            $save_rec = array();
            for($x = 0; $x < $array_length; $x++ ){
                $arr_item = array(
                    "item_details" => $data["item_details"][$x],
                    "availability" => $data["availability"][$x],
                    "status"       => $data["status"][$x],
                    "condition"    => $data["condition"][$x],
                    "comments"     => $data["comments"][$x],
                );
                    array_push($save_rec ,$arr_item);
            }

            //dd($save_rec);
            foreach($save_rec as $facility){
                //dd($facility);
                $facilities = new Facility;
                $facilities->item_details = $facility['item_details'];
                $facilities->availability = $facility['availability'];
                $facilities->status       = $facility['status'];
                $facilities->condition    = $facility['condition'];
                $facilities->comments     = $facility['comments'];
                $facilities->user_id      = auth()->user()->id;
                $facilities->store_id     = auth()->user()->store;
                $facilities->today_date   = $today_date;
                $facilities->store_serial = $store_isbn;

                $facilities->save();
            }
        }

        notify()->success("Report Created!","");

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // $report = Facility::findOrFail($id);
        // //dd($report);
        // return view('facility.edit')->with('report', $report);
        $where = array('id' => $request->id);
        $company  = Facility::where($where)->first();

        return Response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
                'item_details' => $request->item_details,
                'availability' => $request->availability,
                'condition'    => $request->condition,
                'comments'     => $request->comments
            ];

        $facility = Facility::find($id);

        $facility->update($data);

        return Response()->json($facility);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
