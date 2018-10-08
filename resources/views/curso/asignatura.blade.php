<div class="card">
    <div class="card-content">
        <div class="row mg-b0">
            <div class="col s5">
                <label for="asigTitulos[]">Título</label>
                <input type="text" name="asigTitulos[]" value="{{$asignatura->titulo->titulo}}" onfocus="inInput(this);" onblur="outInput(this);">
            </div>
            <div class="col s5">
                <label for="asigDocentes[]">Docente</label>
                <select class="browser-default" name="asigDocentes[]" id="asigDocentes[]" style="border: 1px solid #9e9e9e;">
                    @foreach ($docentes as $docente)
                        @if ($docente->id == old('asigDocentes[]', $asignatura->docente_id))
                            <option value="{{$docente->id}}" selected >{{$docente->nombre}}</option>
                        @else
                            <option value="{{$docente->id}}" >{{$docente->nombre}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col s2">
                <button class="btn red deleteAsig" title="Borrar Asignatura"><i class="far fa-trash-alt"></i></button>
            </div>
        </div>
        <div class="card-action pd-b0">
            <div id="horarios">
                @php
                    $horai = '00:00:01';
                    $horaf = '00:00:01';
                    $horas = 0;
                @endphp
                @foreach ($asignatura->horarios as $hora)
                    @if (!($horai == $hora->hora_ini && $horaf == $hora->hora_fin))
                        <div class="row mg-b0">
                            <div class="col s12 m7 bet">
                                @foreach ($dias as $numdia => $dia)                 
                                    <label>{{$dia}}<br>
                                        @if (!($asignatura->horarios->where('dia', $numdia+1)->where('hora_ini', $hora->hora_ini)->where('hora_fin', $hora->hora_fin)->isEmpty())) 
                                            <input type="checkbox" class="filled-in" checked onchange="checkIt(this)"/>
                                            <span></span>
                                            <input type="number" name="{{'hora'.$dia.'[]'}}" value="1" hidden></label>
                                            @else
                                            <input type="checkbox" class="filled-in" onchange="checkIt(this)"/>
                                            <span></span>
                                            <input type="number" name="{{'hora'.$dia.'[]'}}" value="0" hidden></label>
                                        @endif
                                @endforeach
                            </div>
                            <div class="col s6 m3 bet">
                                <input class="mg-b0 center" type="time" name="horaIniciales[]" value="{{$hora->hora_ini}}" onfocus="inInput(this);" onblur="outInput(this);">
                                <span style="margin-top: 10px;"> - </span>
                                <input class="mg-b0 center" type="time" name="horaFinales[]" value="{{$hora->hora_fin}}" onfocus="inInput(this);" onblur="outInput(this);">
                            </div>
                            @if ($horas)
                                <div class="col s3 m2 right">
                                    <button class="btn-floating btn-small red deleteHora" style="margin-top: 10px;" title="Borrar Horario">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                        @php
                            $horai = $hora->hora_ini;
                            $horaf = $hora->hora_fin;
                            $horas++;
                        @endphp
                    @endif
                @endforeach
            </div>
            <input type="number" readonly="true" name="numHoras[]" value="{{$horas}}" hidden>
        </div>
    </div>
</div>

@section('js')
    <script>let docentes = {!! json_encode($docentes->toArray()) !!};</script>
    <script type="text/javascript" src="{{ asset('js/createasignatura.js') }}"></script>
@endsection