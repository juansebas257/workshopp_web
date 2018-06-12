<?php
$extension=pathinfo($document->file, PATHINFO_EXTENSION);

switch($extension){
    case 'jpeg':
    case 'jpg':
    case 'png':
        $icon="picture-o";
        break;

    case 'pdf':
        $icon="file-pdf-o";
        break;

    case 'pptx':
    case 'ppt':
        $icon="file-powerpoint-o";
        break;

    default:
        $icon="file";
        break;
}
?>

<div class="col s12 m4">
    <div class="card" style="height:200px">
        @if($document->user==Auth::user()->id)
            <a href="#modal_{{$document->id}}" class="red-text pull-right modal-trigger"><i class="fa fa-remove fa-2x"></i></a>
        @endif
        <div href="{{route('document.show',$document->id)}}" style="text-decoration: none;" class="card-content">
            <div clas="card-content">
                <p>
                    <b>Subido por: </b>{{$document->getUser->name}}<br>
                    <b>Fecha: </b>{{date('Y-m-d h:ia',strtotime($document->created_at))}}<br>
                    <b>Materia: </b>{{$document->getCourse->name}}
                </p>
            </div>
            <div class="card-action center-align">
                <a href="{{asset('storage/files/'.$document->file)}}" target="_blank">
                    <i class="fa fa-{{$icon}} fa-4x"></i>
                    <br>
                    <div class="center-align">{{$document->description}}.{{$extension}}</div>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="modal_{{$document->id}}" class="modal">
    <div class="modal-content">
        <h4>Eliminar documento</h4>
        <p>¿Estás seguro que deseas eliminar este documento?</p>
    </div>
    <div class="modal-footer">

        {!! Form::open(['route'=>['document.destroy',$document->id],'method'=>'DELETE','id'=>'modal_delete_form']) !!}
        <div class="row">
            <button href="" class="waves-effect btn-flat red white-text">Eliminar</button>
            <a href="#!" class="modal-close waves-effect btn-flat">Cancelar</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>