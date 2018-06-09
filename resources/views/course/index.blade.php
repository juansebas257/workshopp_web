@extends('layouts.app')

@section('course')
    active
@endsection

@section('bar_title')
    Todas las materias
@endsection

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            @foreach($courses as $course)
                <div class="col s12 m4">
                    <div class="card" style="height:200px">
                        <a href="{{route('course.show',$course->id)}}" style="text-decoration: none;" class="card-content">
                            <div class="card-title" style="padding-left:10px">{{$course->name}}</div>

                            <div class="card-action text-center">
                                <i class="fa fa-folder fa-5x"></i>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!--FLOAT ACTION BUTTON FOR NEW-->
    <div class="fixed-action-btn">
        <a href="{{route('course.create')}}" class="z-depth-5 btn-floating btn-large waves-effect waves-light red">
            <i class="large fa fa-plus"></i>
        </a>
    </div>
@endsection
