<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        // return'i am aya';
        return view('admin.dashboard');
    }
}
