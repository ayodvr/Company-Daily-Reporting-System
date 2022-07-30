<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Event\UserCreated;
use App\Models\User;
use App\Models\Store;
use App\Providers\RouteServiceProvider;
// use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $stores = Store::orderBy('id','asc')->get();
        return view('auth.register')->with('stores', $stores);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'store'    => ['required', 'string', 'max:255'],
        ]);
        
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'store'    => $request->store,
            'password' => Hash::make($request->password),
            'verified' => 0
        ]);

        $user->attachRole('staff');

        // event (new UserCreated($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
