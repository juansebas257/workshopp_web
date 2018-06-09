<?php

namespace App\Http\Controllers;

use App\Area;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $courses=Course::get();
        return view('course.index',compact('courses'));
    }

    public function create(){
        $areas=Area::pluck('name','id')->toArray();
        $areas=[''=>'']+$areas;
        return view('course.create',compact('areas'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|unique:knowledge_areas,name',
        ]);

        $course = new Course();
        $course->fill($request->all());
        $course->save();
        Session::flash('success', 'curso guardado satisfactoriamente.');
        return redirect()->route('area.show',$course->area);
    }

    public function show($id){
        $course=Course::findOrFail($id);

        return view('course.show',compact('course'));
    }
}