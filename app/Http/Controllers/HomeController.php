<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $areas=Area::get();
        return view('home',compact('areas'));
    }
}
