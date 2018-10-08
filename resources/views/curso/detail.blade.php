@extends('admin.layout') 
@section('title', $title) 
@section('content')
<h2>{{$title}}</h2>
        <div class="card {{$curso->color->color1}}">
            <div class="card-content white-text">
                <span class="card-title"><strong>{{$curso->titulo}}</strong></span> 
                @foreach ($curso->asignaturas as $asignatura)
                    <ul><strong>{{$asignatura->titulo->titulo}}</strong><small class="black-text"> - {{$asignatura->docente->nombre}}</small>
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
                <a class="btn-floating btn-large amber darken-4 right center-align z-depth-2" style="pointer-events: none; font-size: 20px;"><strong>${{$curso->precio_mensual}}</strong></a>
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
        <div class="black-text">
                <p><label class="black-text">Periodo: </label>{{$curso->periodo->titulo}}</p>
            </div>
        <a href="/admin/cursos" class="orange-text text-darken-4 waves-effect waves-light"><i class="fas fa-arrow-left"></i> Regresar</a>
        <button id="fire-modal" style="font-size: 15px;" class="btn white-text red right waves-effect waves-light">Borrar <i class="fas fa-trash-alt"></i></button>

<div id="my-modal" class="my-modal">
    <div class="card grey lighten-2 modal-card">
        <div class="card-content">
            <span class="card-title red-text">Advertencia! <i class="fas fa-exclamation-triangle"></i></span>
            <p>Está seguro de borrar este elemento?</p>
        </div>
        <div class="card-action">
            <form action="{{route('cursos.delete', $curso)}}" method="POST" class="bet">
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