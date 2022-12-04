<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Enquiry;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerTemplateExport;
use Spatie\Activitylog\Models\Activity;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $customers = Customer::orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('customer.index')->with('customers', $customers)
                                     ->with('activities', $activities);
    }

    public function downloadGroupTemplate()
    {
        return Excel::download(new CustomerTemplateExport(), 'Customer-Export.csv',\Maatwebsite\Excel\Excel::CSV);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function enquiries()
    {
        $enquiries = Enquiry::orderBy('created_at', 'asc')->get();
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        return view('customer.enquiries')->with('activities', $activities)
                                         ->with('enquiries', $enquiries);
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
            'customer_name'     => 'required',
            'customer_phone'    => 'required',
            'customer_email'    => 'required',
            'customer_birthday'    => 'required',
            'customer_address'  => 'required'
        ]);

        $data = [
            'customer_name'       => $request->get('customer_name'),
            'customer_phone'      => $request->get('customer_phone'),
            'customer_email'      => $request->get('customer_email'),
            'customer_address'    => $request->get('customer_address'),
            'customer_birthday'    => $request->get('customer_birthday'),
            'sales_unit'          => auth()->user()->unit,
            'user_id'             => auth()->user()->id
        ];

        $check_customer = Customer::where('customer_email', $request->customer_email)->exists();

        if($check_customer){

            return back()->with('error','Customer already exist');
        }

        Customer::create($data);

        return back()->with('success','Customer created!');
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
