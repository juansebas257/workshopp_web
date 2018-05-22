<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function show($id){
        $area=Area::findOrFail($id);
        return view('area.show',compact('area'));
    }
}
