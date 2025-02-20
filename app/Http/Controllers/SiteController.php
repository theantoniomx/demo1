<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('index');
    }

    public function services(){
        //return view('services', ["var1"=>"Value 1", "var2"=>"Value 2"]);
        /* $var1 = "Hello";
        $var2 = "World";
        return view('services', compact('var1', 'var2')); */
        $services = Service::all();
        $products = [];
        return view('services', compact('services','products'));
    }

    public function contact(){
        return view('contact');
    }

    public function about(){
        return view('about');
    }
}
