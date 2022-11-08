<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Event\ReportSender;
use App\Models\Store;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $stores = Store::orderBy('id','asc')->get();
        $staffs = Staff::orderBy('id','desc')->simplePaginate(10);
        return view('staffs.index')->with('staffs', $staffs)
                                    ->with('activities', $activities)
                                    ->with('stores', $stores);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $random = random_int(10000, 99999);

        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'store'    => ['required', 'string', 'max:255'],
            'unit'     => ['required', 'string', 'max:255'],
        ]);

        $check_user = User::where('email', $request->email)->exists();

        if($check_user){

            return back()->with('error', 'User already exists!');
        }

        $data0 = 'DWD' . $random;

        $data1 = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'store'    => $request->store,
            'password' => Hash::make($data0),
            'unit'     => $request->unit
        ]);

        $data1->attachRole('staff');

        $data2 = [
            'password' => $data0,
            'email'    => $data1->email
        ];

        Staff::create([
            'fullname' => $data1->name,
            'email'    => $data1->email,
            'store'    => $data1->store,
            'phone'    => $request->phone,
            'unit'     => $data1->unit
        ]);

        event (new ReportSender($data2));

        return back()->with('success','Staff Created!');

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
