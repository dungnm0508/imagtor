<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function getAdminDashboard(){
		return view('layouts/admin/dashboard');
	}
	public function getListStaff(){
		return view('layouts/admin/staff/liststaff');
	}
}
