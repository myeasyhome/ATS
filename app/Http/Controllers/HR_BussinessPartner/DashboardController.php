<?php

namespace App\Http\Controllers\HR_BussinessPartner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	return view('HR_BussinessPartner.dashboard');
    }
}
