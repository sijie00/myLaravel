<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // public function validate(Request $request)
    // {
    //     return Validator::make($request->all(), [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ],[
    //         'name.required'=>"The name field is required",
    //         'name.max'=>"The name may not exceed 255 characters",
    //         'email.required'=>"The email field is required",
    //         'email.email'=>"The email must enter in correct format (e.g. xxx@example.com)",
    //         'email.max'=>"The description may not exceed 255 characters",
    //         'email.unique'=>"The email has been used",
    //         'password.required'=>"The password field is required",
    //         'password.min'=>"The password must more than 8 characters",
    //         'password.confirmed'=>"The password and confirmed password must be same",

    //     ]);

    // }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'name.required'=>"The name field is required",
            'name.max'=>"The name may not exceed 255 characters",
            'email.required'=>"The email field is required",
            'email.email'=>"The email must enter in correct format (e.g. xxx@example.com)",
            'email.max'=>"The description may not exceed 255 characters",
            'email.unique'=>"The email has been used",
            'password.required'=>"The password field is required",
            'password.min'=>"The password must more than 8 characters",
            'password.confirmed'=>"The password and confirmed password must be same",

        ]);
        $validator->validate();

        \App\User::create($request->all(),[
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'gender'=>$request->input('gender'), 
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address'),
            'postcode'=>$request->input('postcode'),
            'city'=>$request->input('city'),
            'country'=>$request->input('country')
        ]);

        return redirect(route("home"));
    }
}
