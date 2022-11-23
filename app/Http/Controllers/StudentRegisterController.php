<?php

namespace App\Http\Controllers;

use App\Event\StudentCreated;
use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\Coupon;
use Codexshaper\WooCommerce\Facades\Product;
use Spatie\Activitylog\Models\Activity;
use App\Models\StudentRegister;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class StudentRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities =  Activity::orderBy('created_at','DESC')->take(6)->get();
        $students = StudentRegister::orderBy('id','desc')->paginate(5);
        // $products = Product::orderBy('id', 'asc')->paginate(20)->toArray();
        // dd($products);

        // $inventories = [];
        // foreach($products as $key => $value){
        //     if($key == 'data'){
        //         foreach($value as $try => $catch){
        //             array_push($inventories, $catch);
        //         };
        //     }
        // }

        // $products = $this->paginate($products, 2);
        // $products->path('');

        //dd($products);
        return view('student.index')->with('students', $students)
                                    ->with('activities', $activities);
    }

    // public function paginate($items, $perPage = 4, $page = null)
    // {
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $total = count($items);
    //     $currentpage = $page;
    //     $offset = ($currentpage * $perPage) - $perPage ;
    //     $itemstoshow = array_slice($items , $offset , $perPage);
    //     return new LengthAwarePaginator($itemstoshow ,$total ,$perPage);
    // }

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
            'school'      => 'required',
            'image'       => 'image|required|max:1999',
            'photo'       => 'image|nullable|max:1999',
            'email'       => 'required',
            'id_card'     => 'image|nullable|max:1999',
            'phone'       => 'required',
            'date'        => 'required',
            'handle'      => 'required',
            'location'    => 'required'
        ]);

        $data = [
            'firstname'     => $request->get('firstname'),
            'lastname'      => $request->get('lastname'),
            'school'        => $request->get('school'),
            'phone'         => $request->get('phone'),
            'date'          => $request->get('date'),
            'handle'        => $request->get('handle'),
            'location'      => $request->get('location'),
            'image'         => $request->get('image'),
            'photo'         => $request->get('photo'),
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

        if ($request->has(['photo'])) {
            $name = time().$request->file('photo')->getClientOriginalName();
            $destination = public_path().'/StudentImages';
            $path='/StudentImages/'.$name;
            $request->file('photo')->move($destination, $name);
            $data['photo'] = $path;
        }

        $check_user = StudentRegister::where('email', $request->email)->exists();

        if($check_user){

            return back()->with('error', 'You have already registered!');
        }

        $Register = StudentRegister::create($data);

        if($Register){

            $random = random_int(1000, 9999);

            $Coupon = [
                'code' => 'DW' . $random,
                'discount_type' => 'percent',
                'amount' => '5',
                'date_expires' => '2025-01-01',
                'individual_use' => true,
                'email_restrictions' => $Register->email,
                'description' => $Register->firstname,
                'exclude_sale_items' => true
            ];

            $coupon = Coupon::create($Coupon);

            event (new StudentCreated($coupon));
        }

        return view('student.thankyou')->with('success', 'Registration Successfull');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = StudentRegister::findorfail($id);
        return view('student.show')->with('student', $student);
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
