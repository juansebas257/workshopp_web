@extends('layouts.app')

@section('bar_title')
    Nueva materia
@endsection

@section('course')
    active
@endsection

@section('content')
    <div class='container-fluid'>
        {!! Form::open(['route'=>'course.store','method'=>'POST','autocomplete'=>'off']) !!}
        <div class="card">
            <div class="card-content">
                <div class="row rowform">
                    <div class="input-field col m6 s12">
                        <label for="name" class="required">Nombre</label>
                        {!! Form::text('name',null,['class'=>'validate','maxlength'=>'255','required','autofocus','id'=>'name']) !!}
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="area" class="active required">Área</label>
                        {!! Form::select('area',$areas,null,['class'=>'validate browser-default','required','id'=>'area']) !!}
                    </div>
                </div>
            </div>

            <div class="card-action center-align">
                {!! Form::button('Guardar',['type'=>'submit','value'=>'Guardar','class'=>'waves-effect waves-light btn','id'=>'guardar']) !!}
            </div>

        </div>
        {!! Form::close() !!}
    </div>
@endsection