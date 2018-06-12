<?php

namespace App\Http\Controllers;

use App\Area;
use App\Course;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use File;
use Storage;

class DocumentController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $documents=Document::get();
        return view('document.index',compact('documents'));
    }

    public function create(){
        $courses=Course::pluck('name','id')->toArray();
        $courses=[''=>'']+$courses;
        return view('document.create',compact('courses'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'description'=>'required',
            'course'=>'required',
            'file'=>'required',
        ]);

        $document = new Document();
        $document->fill($request->all());
        $document->user=Auth::user()->id;
        $file = $request->file('file');
        if (!is_null($file)) {
            $new_name=rand(0,100000).'.'.$file->getClientOriginalExtension();
            $document->file = $new_name;
            Storage::put('public/files/' . $new_name, File::get($file));
        }
        $document->save();

        Session::flash('success', 'Documento guardado satisfactoriamente.');
        return redirect()->route('course.show',$document->course);
    }

    public function destroy($id){
        $document=Document::findOrFail($id);
        $document->delete();

        Session::flash('success', 'Documento eliminado satisfactoriamente.');
        return redirect()->back();
    }
}