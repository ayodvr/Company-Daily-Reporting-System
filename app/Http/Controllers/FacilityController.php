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

        //dd($sales_arr->toArray());
         
        return view("facility.daily_report")->with('report_arr', $report_arr)
                                            ->with('store_report', $store_report)
                                            ->with('activities', $activities);
    }

    public function fetch_records($date_created, $store_location)
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
    
        //dd($report_arr);
        
        return view("facility.report_detail")->with('record_arr', $report_arr)
                                             ->with('t_date', $report_arr[0]['today_date'])
                                             ->with('t_store', $report_arr[0]['store_id'])
                                             ->with('report_id', $report_arr[0]['id'])
                                             ->with('fac_Serial', $report_arr[0]['store_serial'])
                                             ->with('activities', $activities);
        
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
            'condition'    => $request->get('condition'),
            'comments'     => $request->get('comments')
        ];

        $array_length = is_array($data["item_details"]) ? count($data["item_details"]) : 1;
        $array_length = is_array($data["availability"]) ? count($data["availability"]) : 1;
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
                    "condition"    => $data["condition"][$x],
                    "comments"     => $data["comments"][$x],
                );

                array_push($save_one_rec ,$arr_item);

                $facility = new Facility;
                $facility->item_details = $save_one_rec[0]['item_details'];
                $facility->availability = $save_one_rec[0]['availability'];
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
                    "condition"    => $data["condition"][$x],
                    "comments"     => $data["comments"][$x]
                );
                    array_push($save_rec ,$arr_item);
            }

            //dd($save_rec);
            foreach($save_rec as $facility){
                $facility = new Facility;
                $facility->item_details = $save_rec[0]['item_details'];
                $facility->availability = $save_rec[0]['availability'];
                $facility->condition    = $save_rec[0]['condition'];
                $facility->comments     = $save_rec[0]['comments'];
                $facility->user_id      = auth()->user()->id;
                $facility->store_id     = auth()->user()->store;
                $facility->today_date   = $today_date;
                $facility->store_serial = $store_isbn;

                $facility->save();
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
    public function edit($id)
    {
        $report = Facility::findOrFail($id);
        //dd($report);
        return view('facility.edit')->with('report', $report);
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
                'item_details' => $request->details,
                'availability' => $request->availability,
                'condition'    => $request->condition,
                'comments'     => $request->comments
            ];

        $facility = Facility::find($id);

        $facility->update($data);
     
        notify()->success("Report Updated!","");

        return back();
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
