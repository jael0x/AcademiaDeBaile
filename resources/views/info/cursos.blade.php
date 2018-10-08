@extends('layout') 
@section('title', $title) 
@section('content')
<div class="container">
<h2 class="">{{$title}}</h2>

<div class="row">
    @foreach ($cursos as $curso)
    <div class="col s12 m6 row">
    <div class="col s12">
        <div class="card {{$curso->color->color1}}">
            <div class="card-content white-text">
                <span class="card-title"><strong>{{$curso->titulo}}</strong></span> 
                @foreach ($curso->asignaturas as $asignatura)
                    <ul><strong>{{$asignatura->titulo->titulo}}</strong>
                        <br>
                        @php
                            $horai = $asignatura->horarios->first()->hora_ini;
                            $horaf = $asignatura->horarios->first()->hora_fin;
                        @endphp
                        @foreach ($asignatura->horarios as $hora)
                                @if ($horai == $hora->hora_ini && $horaf == $hora->hora_fin)
                                    {{$hora->strdia}} 
                                    @if ($loop->last)
                                        de {{date('G:i', strtotime($hora->hora_ini))}} 
                                        a {{date('G:i', strtotime($hora->hora_fin))}}
                                        <br>
                                    @endif
                                @else
                                    de {{date('G:i', strtotime($horai))}} 
                                    a {{date('G:i', strtotime($horaf))}}
                                    <br>
                                    {{$hora->strdia}} 
                                    @if ($loop->last)
                                        de {{date('G:i', strtotime($hora->hora_ini))}} 
                                        a {{date('G:i', strtotime($hora->hora_fin))}}
                                        <br>
                                    @else
                                        @php
                                            $horai = $hora->hora_ini;
                                            $horaf = $hora->hora_fin;
                                        @endphp
                                    @endif
                                @endif
                        @endforeach
                    </ul>
                    @endforeach
                    <a class="btn-floating btn-large amber darken-4 right center-align price z-depth-2" style="pointer-events: none;"><strong style="font-size: 20px">${{$curso->precio_mensual}}</strong></a>
                </div>
                <div class="card-action grey-text text-darken-3 row {{$curso->color->color2}}">
                @if ($curso->edad_max < 70)
                    <h6 class="right"><strong>{{$curso->edad_min}} a {{$curso->edad_max}} años</strong></h6>
                @else
                    <h6 class="right"><strong>mayores de {{$curso->edad_min}} años</strong></h6>
                @endif
                <h6><strong>Inscripción ${{$curso->precio_inscripcion}}</strong></h6>
            </div>
        </div>
    </div>
    </div>
    @endforeach
</div>
</div>
@endsection