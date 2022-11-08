<?php

namespace App\Http\Controllers;


use DB;
use Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Store;
use App\Models\Retail;
use App\Models\Customer;
use App\Reports\MyReport;
use App\Event\ReportSender;
use Illuminate\Http\Request;
use App\Charts\MonthlySalesChart;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
// use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;


class RetailController extends Controller
{
    public function __contruct()
    {
        $this->middleware("guest");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(MonthlySalesChart $chart)
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(6)->get();
        $anytime = Carbon::now();
        $daily_date = $anytime->toFormattedDateString();
        return view('admin.admindash')->with('activities', $activities)
                                      ->with('daily_date',$daily_date)
                                      ->with(['chart' => $chart->build()]);
    }

    public function timeline()
    {
        $activities =  Activity::orderBy('created_at','DESC')->simplePaginate(5);
        $anytime = Carbon::now();
        $daily_date = $anytime->toFormattedDateString();
        return view('retail.timeline')->with('activities', $activities)
                                      ->with('daily_date',$daily_date);
    }

    public function index()
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $user_id = auth()->user()->id;
        $sales = Retail::all()->groupBy(function ($store_name) {
            $all_stores = $store_name->store;
                return $all_stores;
        })->map(function ($item) {
            return [
                "records" => $item->toArray(),
                "stores"   => $item[0]['store'],
                "total"   => $item->sum('amount'),
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

        return view("retail.report")->with('store_arr', $store_arr)
                                    ->with('activities', $activities)
                                    ->with('staff_arr', $staff_arr);
    }

    public function store_sale($store_sale)
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $sales_arr = Retail::where('store', str_replace('_', ' ', $store_sale))->get()->groupBy(function ($date) {
                return $date->created_at->format('Y-m-d');
        })->map(function ($item) {
            return $item;
        });

        //dd($sales_arr->toArray());

        return view("retail.daily_sale")->with('sales_arr', $sales_arr)
                                        ->with('activities', $activities)
                                        ->with('store_sale', $store_sale);
    }

    public function fetch_records($date_created, $store_location)
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $sales_arr = Retail::where('today_date', $date_created)->get();

        $report_arr = [];
        $report_key = [];

        foreach($sales_arr as $key => $value){
            if(str_replace(' ','_', $value['store']) == $store_location){
                array_push($report_arr, $value);
                array_push($report_key, $key);
            }
        }

        $total_amount = array_column($report_arr, 'amount');
        $t_sum = array_sum($total_amount);

        $total_customers = array_column($report_arr, 'name');
        $count = array_count_values($total_customers);
        $t_count = (count($count));

        //dd($report_arr);

        return view("retail.report_detail")->with('record_arr', $report_arr)
                                           ->with('activities', $activities)
                                           ->with('t_sum', $t_sum)
                                           ->with('t_count', $t_count)
                                           ->with('t_date', $report_arr[0]['today_date'])
                                           ->with('t_store', $report_arr[0]['store']);

    }

    public function generate_pdf($report_key, $store_location)
    {
        $sales_arr = Retail::where('today_date', $report_key)->get();

        $report_arr = [];
        $report_key = [];

        foreach($sales_arr as $key => $value){
            if(str_replace(' ','_', $value['store']) == $store_location){
                array_push($report_arr, $value);
                array_push($report_key, $key);
            }
        }

        //dd($report_arr);

        $total_amount = array_column($report_arr, 'amount');
        $t_sum = array_sum($total_amount);

        $filename = 'retail-report.pdf';

        $mpdf = new \Mpdf\Mpdf();

        $html = \View::make('retail.pdf')->with('record_arr', $report_arr)
                                         ->with('t_sum', $t_sum)
                                         ->with('t_date', $report_arr[0]['created_at'])
                                         ->with('t_store', $report_arr[0]['store']);
        $html = $html->render();

        $mpdf->setFooter('Dreamworks Integrated Systems');
        $mpdf->SetWatermarkImage('assets/luma/img/img003.png');
        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML(utf8_encode($html));
        $mpdf->Output($filename,'I');
    }


    public function send_pdf(Request $request, $report_key, $store_location)
    {

        $data = [
            'email'     => $request->get('email'),
            'subject'   => $request->get('subject'),
            'body'      => $request->get('body')
        ];

        $sales_arr = Retail::where('today_date', $report_key)->get();

        $report_arr = [];
        $report_key = [];

        foreach($sales_arr as $key => $value){
            if(str_replace(' ','_', $value['store']) == $store_location){
                array_push($report_arr, $value);
                array_push($report_key, $key);
            }
        }

        //dd($report_arr);

        $total_amount = array_column($report_arr, 'amount');
        $t_sum = array_sum($total_amount);

        $serial = random_int(10, 99);
        $filename = 'DW'.'-'. $serial .'-'. 'retail-report.pdf';

        $mpdf = new \Mpdf\Mpdf();

        $html = \View::make('retail.pdf')->with('record_arr', $report_arr)
                                         ->with('t_sum', $t_sum)
                                         ->with('t_date', $report_arr[0]['created_at'])
                                         ->with('t_store', $report_arr[0]['store']);
        $html = $html->render();


        $mpdf->setFooter('Dreamworks Integrated Systems');
        $mpdf->SetWatermarkImage('assets/luma/img/img003.png');
        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML(utf8_encode($html));
        $mpdf->Output('Reports'.'/'.$filename,'F');

        $file = public_path().'/'.'Reports'.'/' . $filename;

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
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $anytime = Carbon::now();
        $daily_date = $anytime->format('Y-m-d');
        return view('retail.create')->with('daily_date', $daily_date)
                                    ->with('activities', $activities);
    }

    public function store_locations()
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        return view('retail.stores')->with('activities', $activities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'       => 'nullable',
            'phone'      => 'nullable',
            'email'      => 'nullable',
            'dob'        => 'nullable',
            'invoice'    => 'nullable',
            'product'    => 'nullable',
            'unit'       => 'nullable',
            'price'      => 'nullable',
            'store'      => 'nullable',
            'customer'   => 'nullable',
            'address'    => 'nullable',
            'payment'    => 'nullable',
            'confirm'    => 'nullable',
            'amount'     => 'nullable',
            'visited'    => 'nullable',
            'found'      => 'nullable',
            'cash_hand'  => 'nullable',
            'cash_bank'  => 'nullable',
            'bank_paid'  => 'nullable',
            'payslips'   => 'nullable|mimes:jpeg,jpg,png,gif,pdf|max:1999',
            // 'pro_details'=> 'nullable',
            'serial_no'  => 'nullable',
            // 'qty_sold'   => 'nullable',
            'sys_qty'    => 'nullable',
            'phy_qty'    => 'nullable',
            'inv_paid'   => 'nullable'
        ]);

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

        // !empty($request->except('_token'))

            $retails = new Retail;
            $retails->name           = $request->name;
            $retails->phone          = $request->phone;
            $retails->email          = $request->email;
            $retails->dob            = $request->dob;
            $retails->invoice        = $request->invoice;
            $retails->product        = $request->product;
            $retails->unit           = $request->unit;
            $retails->price          = $request->price;
            $retails->store          = $request->store;
            $retails->customer       = $request->customer;
            $retails->address        = $request->address;
            $retails->payment        = $request->payment;
            $retails->confirm        = $request->confirm;
            $retails->amount         = $request->amount;
            $retails->visited        = $request->visited;
            $retails->found          = $request->found;
            $retails->cash_hand      = $request->cash_hand;
            $retails->cash_bank      = $request->cash_bank;
            $retails->bank_paid      = $request->bank_paid;
            $retails->payslips       = $data['payslips'];
            $retails->serial_no      = $request->serial_no;
            $retails->sys_qty        = $request->sys_qty;
            $retails->phy_qty        = $request->phy_qty;
            $retails->user_id        = auth()->user()->id;
            $retails->store_serial   = $store_isbn;
            $retails->sold_by        = $request->sold_by;
            $retails->today_date     = $request->today_date;

            $retails->save();

            $customer_data = [
                'customer_name' => $retails->name,
                'customer_phone' => $retails->phone,
                'customer_email' => $retails->email
            ];

        Customer::create($customer_data);

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
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $report = Retail::findOrFail($id);
        $anytime = Carbon::now();
        $daily_date = $anytime->format('Y-m-d');
        return view('retail.edit')->with('report', $report)
                                  ->with('activities', $activities)
                                  ->with('daily_date', $daily_date);
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
        //dd($request->all());

        $request->validate([
            'name'       => 'required',
            'phone'      => 'nullable',
            'email'      => 'nullable',
            'dob'        => 'nullable',
            'invoice'    => 'nullable',
            'product'    => 'nullable',
            'unit'       => 'nullable',
            'store'      => 'nullable',
            'customer'   => 'nullable',
            'address'    => 'nullable',
            'payment'    => 'nullable',
            'confirm'    => 'nullable',
            'amount'     => 'nullable',
            'visited'    => 'nullable',
            'found'      => 'nullable',
            'cash_hand'  => 'nullable',
            'cash_bank'  => 'nullable',
            'bank_paid'  => 'nullable',
            'payslips'   => 'nullable|mimes:jpeg,jpg,png,gif,pdf|max:1999',
            // 'pro_details'=> 'nullable',
            'serial_no'  => 'nullable',
            'qty_sold'   => 'nullable',
            'sys_qty'    => 'nullable',
            'phy_qty'    => 'nullable',
            'inv_paid'   => 'nullable'
        ]);

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

        $retail                 = Retail::find($id);
        $retail->name           = $request->name;
        $retail->phone          = $request->phone;
        $retail->email          = $request->email;
        $retail->dob            = $request->dob;
        $retail->invoice        = $request->invoice;
        $retail->product        = $request->product;
        $retail->unit           = $request->unit;
        $retail->store          = $request->store;
        $retail->customer       = $request->customer;
        $retail->address        = $request->address;
        $retail->payment        = $request->payment;
        $retail->confirm        = $request->confirm;
        $retail->amount         = $request->amount;
        $retail->visited        = $request->visited;
        $retail->found          = $request->found;
        $retail->cash_hand      = $request->cash_hand;
        $retail->cash_bank      = $request->cash_bank;
        $retail->bank_paid      = $request->bank_paid;
        $retail->payslips       = $data['payslips'];
        $retail->serial_no      = $request->serial_no;
        $retail->qty_sold        = $request->qty_sold;
        $retail->sys_qty        = $request->sys_qty;
        $retail->phy_qty        = $request->phy_qty;
        $retail->user_id        = auth()->user()->id;
        $retail->store_serial   = $store_isbn;
        $retail->sold_by        = $request->sold_by;
        // $retail->today_date     = $request->today_date;

        if($retail->save()){

            notify()->success("Sale Updated!","Success");

        }else{

            notify()->error("There was a problem updating your Sale!","Error");
        }

        return redirect()->back();
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
