@extends('layouts.app')
@section('course')
    active
@endsection

@section('bar_title')
    Editar materia
@endsection

@section('content')
    <div class='container'>
        <br>
        {!! Form::model($course,['route'=>['course.update',$course],'method'=>'PUT','autocomplete'=>'off','onsubmit'=>'$("#guardar").attr("disabled",true);']) !!}
        <div class="row">
            <div class="col s12">
                <div class="row rowform">
                    <div class="input-field col m6 s12">
                        <label for="document" class="required">Documento</label>
                        {!! Form::text('document',null,['class'=>'validate','maxlength'=>'255','required','autofocus','id'=>'document']) !!}
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="document_type" class="active required">Tipo de documento</label>
                        {!! Form::select('document_type',$document_types,null,['class'=>'validate','required','id'=>'document_type']) !!}
                    </div>
                </div>

                <div class="row rowform">
                    <div class="input-field col m6 s12">
                        <label for="name" class="required">Nombres</label>
                        {!! Form::text('name',null,['class'=>'validate','maxlength'=>'255','required','id'=>'name']) !!}
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="last_name">Apellidos</label>
                        {!! Form::text('lastname',null,['class'=>'validate','maxlength'=>'255','id'=>'last_name']) !!}
                    </div>
                </div>

                <div class="row rowform">
                    <div class="input-field col m6 s12">
                        <label for="cellphone">Celular</label>
                        {!! Form::text('cellphone',null,['class'=>'validate','maxlength'=>'255','id'=>'cellphone']) !!}
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="phone">Fijo</label>
                        {!! Form::text('phone',null,['class'=>'validate','maxlength'=>'255','id'=>'phone']) !!}
                    </div>
                </div>

                <div class="row rowform">
                    <div class="input-field col m6 s12">
                        <label for="email">Email</label>
                        {!! Form::email('email',null,['class'=>'validate','maxlength'=>'255','id'=>'email']) !!}
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="address">Dirección</label>
                        {!! Form::text('address',null,['class'=>'validate','maxlength'=>'255','id'=>'address']) !!}
                    </div>
                </div>

                <div class="row rowform">
                    <div class="input-field col m6 s12">
                        <label for="city" class="active">Ciudad</label>
                        {!! Form::select('city',$cities,null,['class'=>'validate','id'=>'city']) !!}
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="birth" class="active">Fecha de nacimiento</label>
                        {!! Form::date('birth',null,['class'=>'validate','id'=>'birth']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6 s12">
                        <label for="facebook">Facebook</label>
                        {!! Form::text('facebook',null,['class'=>'validate','maxlength'=>'255','id'=>'facebook']) !!}
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="twitter">Twitter</label>
                        {!! Form::text('twitter',null,['class'=>'validate','maxlength'=>'255','id'=>'twitter']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6 s12">
                        <label for="instagram">Instagram</label>
                        {!! Form::text('instagram',null,['class'=>'validate','maxlength'=>'255','id'=>'instagram']) !!}
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="type" class="active">Tipo</label>
                        {!! Form::select('type',[''=>'']+$types,null,['class'=>'validate','id'=>'type']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m12 s12">
                        <div class="input-field col s12">
                            <span>Observaciones</span>
                            {!! Form::textarea('observation',null,['class'=>'validate','maxlength'=>'255','id'=>'instagram']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6 s12">
                        {!! Form::button('Guardar',['type'=>'submit','value'=>'Guardar','class'=>'waves-effect waves-light btn','id'=>'guardar']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection