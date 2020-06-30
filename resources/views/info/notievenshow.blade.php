@extends('layout') 
@section('title', $notieven->titulo) 
@section('content')


<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset($notieven->img_url) }}">
                    @isset($notieven->precio)
                        <div class="btn-floating halfway-fab btn-large amber darken-4 right center-align z-depth-2" style="pointer-events: none; font-size: 20px;"><strong>${{$notieven->precio}}</strong></div>
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
                        <span><i class="fas fa-map-marker-alt"></i> <strong>{{$notieven->teatro->nombre}}</strong></span>                        -
                        <span>{{$notieven->teatro->direccion}}</span><br><br>
                        @endisset
                        @isset($notieven->fecha_eve)
                        <span>
                            <i class="far fa-calendar-alt"></i> 
                            <strong>{{$notieven->fecha_eve->day}} de {{$notieven->fecha_eve->format('F')}}
                            a las {{date('G:i', strtotime($notieven->hora_eve))}}</strong>
                        </span>
                        @endisset
                    </div>
                    <div class="card-action">
                        @isset($notieven->periodo)
                            <span class="right">{{$notieven->periodo->titulo}}</span>
                        @endisset
                        <a href="/noticiasyeventos" class="orange-text text-darken-4"><i class="fas fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection