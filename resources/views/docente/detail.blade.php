@extends('admin.layout') 
@section('title', $title) 
@section('content')

<h5>{{ $title }}</h5>

<div class="card">
    <div class="card-stacked">
        <div class="card-content" style="padding-top: 5px;">
            <blockquote class="blockquote" style="margin : 0;">
                <span class="card-title" style="margin-bottom : 0;"><strong>{{$docente->nombre}}</strong></span>
            </blockquote>
            <p>
                <label for="">Cédula: </label>
                {{$docente->cedula}}
            </p>
                <p>
                    <label for="">Fecha de Ingreso: </label>
                    {{$docente->fecha_ingreso->day}} de {{$docente->fecha_ingreso->format('F')}} del {{$docente->fecha_ingreso->year}}
                </p>
        </div>
        <div class="card-action">
            <a href="/admin/docentes" class="orange-text text-darken-4 waves-effect waves-light"><i class="fas fa-arrow-left"></i> Regresar</a>
        </div>
    </div>
</div>
<button id="fire-modal" style="font-size: 15px;" class="btn white-text red right">Borrar <i class="fas fa-trash-alt"></i></button>

<div id="my-modal" class="my-modal">
    <div class="card grey lighten-2 modal-card">
        <div class="card-content">
            <span class="card-title red-text">Advertencia! <i class="fas fa-exclamation-triangle"></i></span>
            <p>Está seguro de borrar este elemento?</p>
        </div>
        <div class="card-action">
            <form action="{{route('docentes.delete', $docente)}}" method="POST" class="bet">
                {{ method_field('DELETE') }} {{ csrf_field() }}
                <a style="font-size: 15px;" class="btn white black-text waves-effect waves-light">Cancelar <i class="fas fa-times"></i></a>
                <button type="submit" style="font-size: 15px;" class="btn white red-text waves-effect waves-light">Borrar <i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var modal = document.getElementById("my-modal");
    var firemodal = document.getElementById("fire-modal");

    firemodal.onclick = function() {
        modal.style.display = "block";

    }
    modal.onclick = function(){
        modal.style.display = "none";
    }

</script>
@endsection