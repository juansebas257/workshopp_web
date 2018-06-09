@extends('layouts.app')

@section('course')
    active
@endsection

@section('bar_title')
    {{$course->name}}
@endsection

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            @foreach($course->getDocuments as $document)
                @include('document.card')
            @endforeach
        </div>
    </div>

    <!--FLOAT ACTION BUTTON FOR NEW-->
    <div class="fixed-action-btn">
        <a href="{{route('document.create')}}" class="z-depth-5 btn-floating btn-large waves-effect waves-light red">
            <i class="large fa fa-plus"></i>
        </a>
    </div>
@endsection
