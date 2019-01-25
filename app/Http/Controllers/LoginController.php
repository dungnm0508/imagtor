<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTimeZone;
use DateTime;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLoginForm(){
    	return view('auth/loginForm');
    }
    public function getRegisterForm(){
    	date_default_timezone_set('Asia/Kolkata');
    	return view('auth/registerForm');
    }
    public function postRegister(Request $request){
    	if (!User::where('email', '=', $request->txtEmail)->exists()) {
    		try{
    			$user = new User;
    			$user->name = $request->txtUserName;
    			$user->email = $request->txtEmail;
    			$user->time_zone_offet = $request->timezone;
    			$user->password = Hash::make($request->txtPassWord);
    			$user->role = 4;
    			$user->created_at = new Datetime;
    			$user->save(); 
    			return redirect()->route('getLoginForm')->with('status','created account success!');
    		}
    		catch(\Exception $e){
    			echo $e->getMessage();   
    		}
    	}else{
    		return redirect()->route('getRegisterForm')->with('status','Account already exists!');
    	}
    }
    public function postLogin(Request $request){
    	$email = $request->txtEmail;
    	$password = $request->txtPass;
    	$credentials = ['email' => $email, 'password' => $password];

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // return redirect()->intended('dashboard');
            return Auth::user()->role;
        }else{
        	return 'fail';
        }
    }
}
