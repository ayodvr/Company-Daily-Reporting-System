<?php

namespace App\Http\Controllers;

use App\Event\ReportSender;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Models\Store;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Str;
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
        $staffs = Staff::with('users')->simplePaginate(10);
        //dd($staffs);
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

    public function block($id)
    {
        User::find($id)->update(['verified' => 0 ]);

        return back()->with('success','User has been blocked');
    }

    public function unblock($id)
    {
        User::find($id)->update(['verified' => 1 ]);

        return back()->with('success','User has been unblocked');
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

        // $random = random_int(10000, 99999);

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

        $data0 = Str::random(10);

        // $data0 = 'DWD' . $random;

        $data1 = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'store'    => $request->store,
            'password' => Hash::make($data0),
            'unit'     => $request->unit
        ]);

        $data1->attachRole('staff');

        $data2 = Staff::create([
            'fullname' => $data1->name,
            'email'    => $data1->email,
            'store'    => $data1->store,
            'user_id'  => $data1->id,
            'phone'    => $request->phone,
            'unit'     => $data1->unit
        ]);

        $data3 = [
            'fullname' => $data2->fullname,
            'email'    => $data2->email,
            'password' => $data0
        ];

        event (new ReportSender($data3));

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

    public function staff_profile()
    {
        $auth = auth()->user()->id;
        $activities =  Activity::orderBy('created_at','DESC')->take(5)->get();
        $staff = Staff::where('user_id',$auth)->first();
        return view('staffs.settings')->with('staff', $staff)
                                      ->with('activities', $activities);
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
            'fullname'       => 'required',
            'email'          => 'nullable',
            'store'          => 'nullable',
            'user_id'        => 'nullable',
            'phone'          => 'nullable',
            'unit'           => 'nullable',
            'daily_target'   => 'nullable',
            'weekly_target'  => 'nullable',
            'monthly_target' => 'nullable'
        ]);

        $staff                         = Retail::find($id);
        $staff->fullname               = $request->fullname;
        $staff->email                  = $request->email;
        $staff->store                  = $request->store;
        $staff->user_id                = $staff['id'];
        $staff->phone                  = $request->phone;
        $staff->unit                   = $request->unit;
        $staff->daily_target           = $request->daily_target;
        $staff->weekly_target          = $request->weekly_target;
        $staff->monthly_target         = $request->monthly_target;

        if($staff->save()){

            notify()->success("Profile Updated!","Success");

        }else{

            notify()->error("There was a problem updating your Profile!","Error");
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
