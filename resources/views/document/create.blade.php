@extends('layouts.app')

@section('bar_title')
    Nuevo Documento
@endsection

@section('course')
    active
@endsection

@section('content')
    <div class='container-fluid'>
        {!! Form::open(['route'=>'document.store','method'=>'POST','autocomplete'=>'off','files'=>true]) !!}
        <div class="card">
            <div class="card-content">
                <div class="row rowform">
                    <div class="input-field col m6 s12">
                        <label for="description" class="required">Descripción</label>
                        {!! Form::text('description',null,['class'=>'validate','maxlength'=>'255','required','autofocus','id'=>'name']) !!}
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="course" class="active required">Materia</label>
                        {!! Form::select('course',$courses,null,['class'=>'validate browser-default','required','id'=>'course']) !!}
                    </div>
                </div>
                <div class="row rowform">
                    <div class="input-field col m6 s12">
                        <label for="calification" class="active required">Calificación</label>
                        {!! Form::number('calification',null,['class'=>'validate','id'=>'calification','min'=>0,'step'=>0.01]) !!}
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="type" class="active required">Tipo</label>
                        {!! Form::select('type',[1=>'Taller',2=>'Exámen'],null,['class'=>'validate browser-default','required','id'=>'type']) !!}
                    </div>
                </div>
                <div class="row rowform">
                    <div class="file-field input-field col m6 s12">
                        <div class="btn">
                            <span><i class="fa fa-upload"></i> Subir Archivo</span>
                            {!! Form::file('file',null,['required','id'=>'file']) !!}
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
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