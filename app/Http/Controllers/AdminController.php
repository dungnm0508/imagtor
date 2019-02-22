<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTimeZone;
use DateTime;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
	public function getAdminDashboard(){
		return view('layouts/admin/dashboard');
	}
	public function getListStaff(){
		return view('layouts/admin/staff/liststaff');
	}
	public function postRegisterStaff(Request $request){

		if (!User::where('email', '=', $request->email)->exists()) {
    		try{
    			$user = new User;
    			$user->name = $request->username;
    			$user->email = $request->email;
    			$user->time_zone_offet = $request->timezone;
    			$user->password = Hash::make($request->password);
    			$user->pass_no_hash = $request->password;
    			$user->role = $request->role;
    			$user->created_at = new Datetime;
    			$user->save(); 
    			return [
    				"message"=>"Insert Account Success!"
    			];
    		}
    		catch(\Exception $e){
    			echo $e->getMessage();   
    		}
    	}else{
    		return [
    				"message"=>"Account already exists!"
    			];
    	}
	}
}
