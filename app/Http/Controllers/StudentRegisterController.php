<?php

namespace App\Http\Controllers;

use App\Event\StudentCreated;
use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\Coupon;
use App\Models\StudentRegister;


class StudentRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        //dd($coupons);
        return view('student.index')->with('coupons', $coupons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
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
            'firstname'   => 'required',
            'lastname'    => 'required',
            'matric_no'   => 'required',
            'image'       => 'required',
            'id_card'     => 'required'
        ]);

        $data = [
            'firstname'     => $request->get('firstname'),
            'lastname'      => $request->get('lastname'),
            'matric_no'     => $request->get('matric_no'),
            'image'         => $request->get('image'),
            'email'         => $request->get('email'),
            'id_card'       => $request->get('id_card')
        ];

        if ($request->has(['image'])) {
            $name = time().$request->file('image')->getClientOriginalName();
            $destination = public_path().'/StudentImages';
            $path='/StudentImages/'.$name;
            $request->file('image')->move($destination, $name);
            $data['image'] = $path;
        }

        if ($request->has(['id_card'])) {
            $name = time().$request->file('id_card')->getClientOriginalName();
            $destination = public_path().'/StudentImages';
            $path='/StudentImages/'.$name;
            $request->file('id_card')->move($destination, $name);
            $data['id_card'] = $path;
        }

        $Register = StudentRegister::create($data);

        if($Register){

            $random = random_int(1000, 9999);

            $Coupon = [
                'code' => 'DW' . $random,
                'discount_type' => 'percent',
                'amount' => '5',
                'individual_use' => true,
                'email_restrictions' => $Register->email,
                'exclude_sale_items' => true
            ];
            
            $coupon = Coupon::create($Coupon);

            event (new StudentCreated($coupon));
        }

        return back()->with('success', 'Registration Successfull');

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
