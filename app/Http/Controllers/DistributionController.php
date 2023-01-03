<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Mail;
use Carbon\Carbon;
use SheetDB\SheetDB;
use Spatie\Activitylog\Models\Activity;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Store;
use App\Models\Enquiry;
use App\Models\Distribution;
use App\Models\SaleItem;
use App\Models\SalePayment;
use App\Models\SaleTemp;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Charts\MonthlySalesChart;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $user_id = auth()->user()->id;
        $sales = Distribution::all()->groupBy(function ($sales_rep) {
            $sale_name = $sales_rep->user_id;
                return $sale_name;
        })->map(function ($item) {
            return [
                "records" => $item->toArray(),
                "sales_rep"   => $item[0]['user_id']
                // "total"   => $item->sum('amount'),
              ];
        });
        //dd($sales);
            $admin_arr = [];
            $keys = [];
            foreach($sales as $key => $value){
                array_push($keys, $key);
                $person = User::where('id', $key)->get();
                array_push($admin_arr,$person[0]['name']);
            }

            if(Auth::user()->hasRole('staff')){
                $person = User::where('id', $keys)->get();
                //$staff_arr = $person[0]['name'];
            }

        return view("distribution.index")->with('activities', $activities)
                                         ->with('admin_arr', $admin_arr)
                                         ->with('staff_arr', $person[0]['name']);
    }

    public function staff_sale($staff_sale)
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $sales_arr = Distribution::where('sold_by', str_replace('_', ' ', $staff_sale))->get()->groupBy(function ($date) {
                return $date->created_at->format('Y-m-d');
        })->map(function ($item) {
            return $item;
        });

        //dd($sales_arr);
        $sales_arr1 = [];

        foreach($sales_arr as $key => $value){
            if(isset($key)){
                array_push($sales_arr1,$value[0]['sold_by']);
            }
        }

        //dd($sales_arr1);

        return view("distribution.staff_sale")->with('sales_arr', $sales_arr1[0])
                                              ->with('activities', $activities);
    }


    public function fetch_records(Request $request)
    {
        //dd($request->all());
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $disty_arr = Distribution::where('today_date', $request->date)->get();
        //dd($disty_arr);

        $auth = auth()->user()->id;

        $report_arr = [];
        $report_key = [];

        foreach($disty_arr as $key => $value){

            if(str_replace(' ','_', $value['sold_by']) == ($request->staff)){
                //dd($value);
                array_push($report_arr, $value);
                array_push($report_key, $key);
            }
        }

        $total_amount = array_column($report_arr, 'amount');
        $t_sum = array_sum($total_amount);

        $total_customers = array_column($report_arr, 'name');
        $count = array_count_values($total_customers);
        $t_count = (count($count));
        $temp = $request->staff;

        //dd($report_arr);
        if(!empty($report_arr)){
            return view("distribution.disty_detail")->with('record_arr', $report_arr)
                                                ->with('sales_reps', $temp)
                                                ->with('activities', $activities)
                                                ->with('t_sum', $t_sum)
                                                ->with('t_count', $t_count)
                                                ->with('t_date', $report_arr[0]['today_date'])
                                                ->with('t_store', $report_arr[0]['store'])
                                                ->with('amount', $report_arr[0]['amount']);
        }else{
            notify()->error("No report found for selected date!","");

            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sheetdb = new SheetDB('832xror5om6j2','ALL');
        $products = $sheetdb->get();
        $anytime = Carbon::now();
        $daily_date = $anytime->format('Y-m-d');
        $customers = Customer::orderBy('id', 'asc')->get();
        // $products = Product::orderBy('id', 'desc')->get();
        return view('distribution.create')->with('daily_date', $daily_date)
                                    ->with('products', $products)
                                    ->with('customers', $customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_name'       => 'required',
            'location'           => 'nullable',
            'account_type'       => 'nullable',
            'date'               => 'nullable',
            'product_detail'     => 'nullable',
            'location'           => 'nullable',
            'status'             => 'nullable',
            'product'            => 'nullable',
            'price'              => 'nullable',
            'amount'              => 'nullable',
            'unit'               => 'nullable',
            'user_id'            => 'nullable',
            'store_serial'       => 'nullable',
            'sold_by'            => 'nullable',
            'store_code'         => 'nullable'
            // 'payslips'   => 'nullable|mimes:jpeg,jpg,png,gif,pdf|max:1999',
        ]);

       //dd($request->all());

            $serial = random_int(1000, 9999);
            $store_name = Store::where('store_name',$request->get('store'))->first();
            $store_abrv = substr($store_name['store_name'], 3, 3);
            $store_isbn = 'DW' . strtoupper($store_abrv) . $serial;

            if ($request->has(['payslips'])) {
                $name = time().$request->file('payslips')->getClientOriginalName();
                $destination = public_path().'/Payslips';
                $path='/Payslips/'.$name;
                $request->file('payslips')->move($destination, $name);
                $data['payslips'] = $path;
            }

            $cust_detail = Customer::where('id', $request->account_name)->get();

            //dd($cust_detail);

            $distribution = new Distribution;

            $distribution->account_name          = $cust_detail[0]['customer_name'];
            $distribution->account_phone         = $cust_detail[0]['customer_phone'];
            $distribution->account_email         = $cust_detail[0]['customer_email'];
            $distribution->account_address       = $cust_detail[0]['customer_address'];
            $distribution->account_birthday      = $cust_detail[0]['customer_birthday'];
            $distribution->location              = $request->location;
            $distribution->account_type          = $request->account_type;
            $distribution->date                  = $request->date;
            $distribution->product_detail        = $request->product_detail;
            $distribution->status                = $request->status;
            $distribution->product               = $request->product;
            $distribution->price                 = $request->price;
            $distribution->unit                  = $request->unit;
            $distribution->amount                = $request->amount;
            $distribution->user_id               = $request->user_id;
            // $distribution->payslips       = $data['payslips'];
            $distribution->user_id               = auth()->user()->id;
            $distribution->sales_unit            = "distribution";
            $distribution->store_serial          = $store_isbn;
            $distribution->sold_by               = $request->sold_by;
            $distribution->today_date            = $request->today_date;

            $distribution->save();

            $customer_enquiries = [
                'customer_name'   => $distribution->account_name,
                'customer_phone'  => $distribution->account_phone,
                'customer_email'  => $distribution->account_email,
                'customer_status' => $distribution->status,
                'Product_detail'  => $distribution->product_detail,
                'sales_unit'      => $distribution->unit,
                'sales_rep_id'    => $distribution->user_id
            ];

            Enquiry::create($customer_enquiries);

        // notify()->success("Report Created!","");

        return back()->with('success', 'Report Created!');
    }

    public function generate_pdf($report_key, $store_location)
    {
         $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
         $disty_arr = Distribution::where('today_date', $report_key)->get();
         //dd($disty_arr);

         $auth = auth()->user()->id;

         $report_arr = [];
         $report_key = [];

         foreach($disty_arr as $key => $value){

             if(str_replace(' ','_', $value['sold_by']) == ($store_location)){
                 //dd($value);
                 array_push($report_arr, $value);
                 array_push($report_key, $key);
             }
         }

         $total_amount = array_column($report_arr, 'amount');
         $t_sum = array_sum($total_amount);

         $total_customers = array_column($report_arr, 'name');
         $count = array_count_values($total_customers);
         $t_count = (count($count));
         $temp = $store_location;

        $filename = 'distribution-report.pdf';

        $mpdf = new \Mpdf\Mpdf();

        $html = \View::make('distribution.pdf')->with('record_arr', $report_arr)
                                                ->with('sales_reps', $temp)
                                                ->with('activities', $activities)
                                                ->with('t_sum', $t_sum)
                                                ->with('t_date', $report_arr[0]['created_at'])
                                                ->with('t_count', $t_count)
                                                ->with('amount', $report_arr[0]['amount']);
        $html = $html->render();

        $mpdf->setFooter('Dreamworks Integrated Systems');
        // $mpdf->SetWatermarkImage('assets/luma/img/img003.png');
        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML(utf8_encode($html));
        $mpdf->Output($filename,'I');
    }


    public function download_pdf($report_key, $store_location)
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
         $disty_arr = Distribution::where('today_date', $report_key)->get();
         //dd($disty_arr);

         $auth = auth()->user()->id;

         $report_arr = [];
         $report_key = [];

         foreach($disty_arr as $key => $value){

             if(str_replace(' ','_', $value['sold_by']) == ($store_location)){
                 //dd($value);
                 array_push($report_arr, $value);
                 array_push($report_key, $key);
             }
         }

         $total_amount = array_column($report_arr, 'amount');
         $t_sum = array_sum($total_amount);

         $total_customers = array_column($report_arr, 'name');
         $count = array_count_values($total_customers);
         $t_count = (count($count));
         $temp = $store_location;

        $filename = 'distribution-report.pdf';

        $mpdf = new \Mpdf\Mpdf();

        $html = \View::make('distribution.pdf')->with('record_arr', $report_arr)
                                                ->with('sales_reps', $temp)
                                                ->with('activities', $activities)
                                                ->with('t_sum', $t_sum)
                                                ->with('t_date', $report_arr[0]['created_at'])
                                                ->with('t_count', $t_count)
                                                ->with('amount', $report_arr[0]['amount']);
        $html = $html->render();

        $mpdf->setFooter('Dreamworks Integrated Systems');
        // $mpdf->SetWatermarkImage('assets/luma/img/img003.png');
        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML(utf8_encode($html));
        $mpdf->Output($filename,'D');
    }


    public function send_pdf(Request $request, $report_key, $store_location)
    {
        //dd($request->all());
        $data = [
            'email'     => $request->get('email'),
            'subject'   => $request->get('subject'),
            'body'      => $request->get('body'),
        ];

        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $sales_arr = Distribution::where('today_date', $report_key)->get();

        $report_arr = [];
        $report_key = [];

        foreach($sales_arr as $key => $value){
            if(str_replace(' ','_', $value['sold_by']) == $store_location){
                array_push($report_arr, $value);
                array_push($report_key, $key);
            }
        }

        $total_amount = array_column($report_arr, 'amount');
        $t_sum = array_sum($total_amount);
        $total_customers = array_column($report_arr, 'name');
        $count = array_count_values($total_customers);
        $t_count = (count($count));

        $serial = random_int(10, 99);
        $filename = 'DW'.'-'. $serial .'-'. 'distribution-report.pdf';
        $temp = $report_arr[0]['sold_by'];

        $mpdf = new \Mpdf\Mpdf();

        $html = \View::make('distribution.pdf')->with('record_arr', $report_arr)
                                                ->with('sales_reps', $temp)
                                                ->with('activities', $activities)
                                                ->with('t_sum', $t_sum)
                                                ->with('t_date', $report_arr[0]['created_at'])
                                                ->with('t_count', $t_count)
                                                ->with('amount', $report_arr[0]['amount']);
        $html = $html->render();

        $mpdf->setFooter('Dreamworks Integrated Systems');
        // $mpdf->SetWatermarkImage('assets/luma/img/img003.png');
        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML(utf8_encode($html));
        $mpdf->Output('Distributions'.'/'.$filename,'F');

        $file = public_path().'/'.'Distributions'.'/' . $filename;

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

    public function ExportExcel($customer_data){

        //dd($customer_data);

        ini_set('max_execution_time', 0);

        ini_set('memory_limit', '4000M');

        try {

            $Excel_writer = $customer_data;

            header('Content-Type: application/vnd.ms-excel');

            header('Content-Disposition: attachment;filename="Distribution_Report.xls"');

            header('Cache-Control: max-age=0');

            ob_end_clean();

            $Excel_writer->save('php://output');

            exit();

        } catch (Exception $e) {

            return;

        }
    }

    public function downloadExcelTemplate($report_key, $store_location)
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
         $disty_arr = Distribution::where('today_date', $report_key)->get();
         //dd($disty_arr);

         $auth = auth()->user()->id;

         $report_arr = [];
         $report_key = [];

         foreach($disty_arr as $key => $value){

             if(str_replace(' ','_', $value['sold_by']) == ($store_location)){
                 //dd($value);
                 array_push($report_arr, $value);
                 array_push($report_key, $key);
             }
         }

        //  $serial = random_int(10, 99);
        //  $filename = 'Distribution' . '/'.'DW'.'-'. $store_location .'-'. $serial .'-'. 'distribution-report.xls';

         $total_amount = array_column($report_arr, 'amount');
         $t_sum = array_sum($total_amount);

         $total_customers = array_column($report_arr, 'name');
         $count = array_count_values($total_customers);
         $t_count = (count($count));
         $temp = $store_location;

        $html = \View::make('distribution.excel')->with('record_arr', $report_arr)
                                                ->with('sales_reps', $temp)
                                                ->with('activities', $activities)
                                                ->with('t_sum', $t_sum)
                                                ->with('t_date', $report_arr[0]['created_at'])
                                                ->with('amount', $report_arr[0]['amount'])
                                                ->with('t_count', $t_count);
        $htmlString = $html->render();

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();

        $spreadsheet = $reader->loadFromString($htmlString);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');

        // $writer->save($filename);

        $this->ExportExcel($writer);

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
        //
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
        //
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
