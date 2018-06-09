@extends('layouts.app')

@section('areas')
    active
@endsection

@section('content')
    <div class="container-fluid">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h3 class="text-center">Selecciona el área de conocimiento de tu interes</h3>
        <div class="row">
            @foreach($areas as $area)
                <div class="col s12 m4">
                    <div class="card" style="height:200px">
                        <a href="{{route('area.show',$area->id)}}" style="text-decoration: none;" class="card-content">
                            <div class="card-title" style="padding-left:10px">{{$area->name}}</div>

                            <div class="card-action text-center">
                                <i class="fa fa-folder fa-5x"></i>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
