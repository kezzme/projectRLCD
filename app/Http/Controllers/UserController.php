<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{   
    //route register
    public function register(){
        return view('user.register');
    }

    //route login
    public function login(){
        return view('user.login');
    }

    //Verify Login
    public function process(Request $request)
    {
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required']
          ]);
        
        //Attempt user login, also if credentials are correct
        if(auth()->guard('web')->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    //Logout
    public function logout(Request $request)
    {
        auth()->guard('web')->logout();

        //invalidate the user and to generate new token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //redirect path after logout
        return redirect('/');
    } 

    //Validate input
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "phone" => ['required', 'min:11'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:4'
                ],[
            'required' => 'Need to fill up your :attribute',
            ]);
            
            if($validator->fails()){
                return redirect()->route('register')->withErrors($validator)->withInput();
            }

            $validated = $validator->validated();

            //Convert into hashed password
            $validated['password'] = bcrypt( $validated['password']);

            //Create User
            $user = User::create($validated);
            
            //Serve as logged in
            $user = Auth::guard('web')->login($user);
            
            //Redirect path after register
            return redirect()->route('home')->with('success', 'Welcome First timer' . auth('web')->user()->first_name);

            }   

}