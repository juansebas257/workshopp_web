@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h3 class="text-center">{{$area->name}}</h3>
        <div class="row">
            @foreach($area->getCourses as $course)
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a class="panel panel-default thumbnail" href="{{route('course.show',$course->id)}}" style="text-decoration: none;">
                        <div class="panel-heading">{{$course->name}}</div>

                        <div class="panel-body text-center">
                            <i class="fa fa-folder fa-5x"></i>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
