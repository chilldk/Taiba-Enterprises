<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller{

    public function index(){
        return view('home.index');
    }

    public function about(){
        return view('home.about');
    }

    public function portfolio(){
        return view('home.portfolio');
    }
   
    public function services(){
        return view('home.services');
    }

    public function contact_us(){
        return view('home.contact');
    }
        
}