@extends('admin.layout') 
@section('title', $title) 
@section('content')
{{-- {{dd($notieven->img_url)}} --}}

<h5>{{ $title }}</h5>

<div class="card">
    <div class="card-image">
        <img src="{{asset($notieven->img_url)}}">
        @isset($notieven->precio)
            <div class="btn-floating halfway-fab btn-large orange darken-4 right center-align valign-wrapper" style="pointer-events: none; font-size: 20px;"><span>${{$notieven->precio}}</span></div>
        @endisset
    </div>
    <div class="card-stacked">
        <div class="card-content" style="padding-top: 5px;">
            <blockquote class="blockquote" style="margin : 0;">
                <span class="card-title" style="margin-bottom : 0;"><strong>{{$notieven->titulo}}</strong></span>
            </blockquote>
            <small class="grey-text text-darken-1">
                {{$notieven->fecha}} - {{$notieven->tipo->titulo}} 
                @isset($notieven->docente->nombre)
                    - {{$notieven->docente->nombre}}
                @endisset
            </small><br>
            <p class="justify">{{$notieven->descripcion}}</p><br> 
            @isset($notieven->teatro)
                <span><i class="fas fa-map-marker-alt"></i> <strong>{{$notieven->teatro->nombre}}</strong></span> -
                <span>{{$notieven->teatro->direccion}}</span><br><br> 
            @endisset 
            @isset($notieven->fecha_eve)
                <span>
                    <i class="far fa-calendar-alt"></i> 
                    <strong>{{$notieven->fecha_eve->day}} de {{$notieven->fecha_eve->format('F')}} a las {{date('G:i', strtotime($notieven->hora_eve))}}</strong>
                </span>
            @endisset
        </div>
        <div class="card-action">
            @isset($notieven->periodo)
            <span class="right">{{$notieven->periodo->titulo}}</span> @endisset
            <a href="/admin/noticias" class="orange-text text-darken-4"><i class="fas fa-arrow-left"></i> Regresar</a>
        </div>
    </div>
</div>
<button id="fire-modal" style="font-size: 15px;" class="btn white-text red right waves-effect waves-light">Borrar <i class="fas fa-trash-alt"></i></button>

<div id="my-modal" class="my-modal">
    <div class="card grey lighten-2 modal-card">
        <div class="card-content">
            <span class="card-title red-text">Advertencia! <i class="fas fa-exclamation-triangle"></i></span>
            <p>Está seguro de borrar este elemento?</p>
        </div>
        <div class="card-action">
            <form action="{{route('noticias.delete', $notieven)}}" method="POST" class="bet">
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