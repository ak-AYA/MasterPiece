<?php

namespace App\Http\Controllers;
use App\Models\Category;



class WebsiteController extends Controller
{
    public function index(){
        $categories = Category ::all();
        return view('website.index', compact('categories'));
    }

}
