@extends('admin.layout') 
@section('title', $title) 
@section('content')
<h5>{{ $title }}</h5>

@if ($errors->any())
<h6 class="red-text">Por favor corrija los siguientes errores:</h6>
@endif

<form method="POST" action="{{ url('admin/cursos/create') }}">
    {{ csrf_field() }}
    <div class="input-field">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
        <span id="mtitulo" class="helper-text red-text">{{ $errors->first('titulo') }}</span>
    </div>

    <label for="rango">Rango</label>
    <div class="row mg-b0">
        <div class="col s6">
            <div class="input-field">
                <label for="edad_min">Edad Mínima</label>
                <input type="number" name="edad_min" id="edad_min" value="{{ old('edad_min') }}">
                <span id="medad_min" class="helper-text red-text">{{ $errors->first('edad_min') }}</span>
            </div>
        </div>
        <div class="col s6">
            <div class="input-field">
                <label for="edad_max">Edad Máxima</label>
                <input type="number" name="edad_max" id="edad_max" value="{{ old('edad_max') }}">
                <span id="medad_max" class="helper-text red-text">{{ $errors->first('edad_max') }}</span>
            </div>
        </div>
    </div>

    <label for="rango">Costos</label>
    <div class="row mg-b0">
        <div class="col s6">
            <div class="input-field">
                <label for="precio_inscripcion">Inscripción</label>
                <input type="number" name="precio_inscripcion" id="precio_inscripcion" value="{{ old('precio_inscripcion') }}">
                <span id="mprecio_inscripcion" class="helper-text red-text">{{ $errors->first('edad_min') }}</span>
            </div>
        </div>
        <div class="col s6">
            <div class="input-field">
                <label for="precio_mensual">Costo Mensual</label>
                <input type="number" name="precio_mensual" id="precio_mensual" value="{{ old('precio_mensual') }}">
                <span id="mprecio_mensual" class="helper-text red-text">{{ $errors->first('precio_mensual') }}</span>
            </div>
        </div>
    </div>

    <div class="row mg-b0">
        <div class="col s6">
            <label for="periodo_id">Periodo</label>
            <select class="browser-default" name="periodo_id" id="periodo_id" style="border: 1px solid #9e9e9e;">
                <option value="" selected>Seleccione</option>
                @foreach ($periodos as $periodo)
                    @if ($periodo->id == old('periodo_id'))
                        <option value="{{$periodo->id}}" selected>{{$periodo->titulo}}</option>
                    @else
                        <option value="{{$periodo->id}}">{{$periodo->titulo}}</option>
                    @endif
                @endforeach
            </select>
            <div class="input-field" style="margin-top: 8px;">
                <span id="mperiodo_id" class="helper-text red-text">{{ $errors->first('periodo_id') }}</span>
            </div>
        </div>
        <div class="col s6">
            <label for="color_id">Color</label>
            <select class="browser-default" name="color_id" id="color_id" style="border: 1px solid #9e9e9e;">
                <option value="" selected>Seleccione</option>
                @foreach ($colors as $color)
                    @if ($color->id == old('color_id'))
                        <option value="{{$color->id}}" selected class="{{$color->color1}}">{{$color->titulo}}</option>
                    @else
                        <option value="{{$color->id}}" class="{{$color->color1}}"><p class="white">{{$color->titulo}}</option>
                    @endif
                @endforeach
            </select>
            <div class="input-field" style="margin-top: 8px;">
                <span id="mcolor_id" class="helper-text red-text">{{ $errors->first('color_id') }}</span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-content">
            <span class="card-title">Asignaturas</span>
            <div class="row mg-b0">
                <div class="col s5">
                    <div class="input-field">
                        <label for="asig_titulo">Nombre</label>
                        <input type="text" name="asig_titulo" id="asig_titulo">
                        <span id="masig_titulo" class="helper-text red-text"></span>
                    </div>
                </div>
                <div class="col s5">
                    <label for="docente_id">Docente</label>
                    <select class="browser-default" name="docente_id" id="docente_id" style="border: 1px solid #9e9e9e;">
                                <option value="" selected>Seleccione</option>
                                @foreach ($docentes as $docente)
                                    <option value="{{$docente->id}}">{{$docente->nombre}}</option>
                                @endforeach
                            </select>
                    <div class="input-field" style="margin-top: 2px;">
                        <span id="mdocente_id" class="helper-text red-text"></span>
                    </div>
                </div>
                <div class="col s2">
                    <button class="btn" title="Agregar Asignatura" onclick="addAsig(event)" style="margin-top: 25px;"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <div class="card-action pd-b0">
                <div class="row mg-b0">
                    <div class="col s12 m7 bet">
                        <label>
                            Lun<br>
                            <input type="checkbox" class="filled-in" name="lunes"/>
                            <span></span>
                        </label>
                        <label>
                            Mar<br>
                            <input type="checkbox" class="filled-in" name="martes"/>
                            <span></span>
                        </label>
                        <label>
                            Mie<br>
                            <input type="checkbox" class="filled-in" name="miercoles"/>
                            <span></span>
                        </label>
                        <label>
                            Jue<br>
                            <input type="checkbox" class="filled-in" name="jueves"/>
                            <span></span>
                        </label>
                        <label>
                            Vie<br>
                            <input type="checkbox" class="filled-in" name="viernes"/>
                            <span></span>
                        </label>
                        <label>
                            Sab<br>
                            <input type="checkbox" class="filled-in" name="sabado"/>
                            <span></span>
                        </label>
                        <label>
                            Dom<br>
                            <input type="checkbox" class="filled-in" name="domingo"/>
                            <span></span>
                        </label>
                    </div>
                    <div class="col s6 m3 bet">
                        <input class="mg-b0 center" type="time" name="hora_ini" id="hora_ini" value="{{ old('hora_ini') }}">
                        <span style="margin-top: 10px;"> - </span>
                        <input class="mg-b0 center" type="time" name="hora_fin" id="hora_fin" value="{{ old('hora_fin') }}">
                    </div>
                    <div class="col s3 m2 right">
                        <button class="btn-floating btn-small" title="Agregar Horario" onclick="addHora(event)"  style="margin-top: 10px;"><i class="fas fa-plus"></i></button>                
                    </div>
                </div>
                <div class="input-field mg-b0" style="margin-top: 2px;">
                    <span id="mhoras" class="helper-text red-text">{{$errors->first('asigTitulos')}}</span>
                </div>
                <div id="horarios"></div>
            </div>
        </div>
    </div>
    
    <div id="asignaturas"></div>

    <a class="waves-effect waves-light btn grey darken-1" href="{{ route('cursos.index') }}">Regresar</a>
    <button id="submitbtn" class="btn waves-effect waves-light" type="submit">Crear</button>
</form>
@endsection
 
@section('js')
<script>let docentes = {!! json_encode($docentes->toArray()) !!};</script>
<script type="text/javascript" src="{{ asset('js/createasignatura.js') }}"></script>
@endsection