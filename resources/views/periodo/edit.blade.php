@extends('admin.layout') 
@section('title', $title) 
@section('content')
<h5>{{ $title }}</h5>

@if ($errors->any())
<h6 class="red-text">Por favor corrija los siguientes errores:</h6>
@endif

<form method="POST" action="{{ url("admin/periodos/edit/{$periodo->id}") }}">
    {{ method_field('PUT') }}        
    {{ csrf_field() }}
    <div class="input-field">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $periodo->titulo) }}">
        <span id="mtitulo" class="helper-text red-text">{{ $errors->first('titulo') }}</span>
    </div>

    <div class="row">
        <div class="col s6">
            <label for="mes_ini">Mes de Inicio</label>
            <select class="browser-default" name="mes_ini" id="mes_ini" style="border: 1px solid #9e9e9e;">
            <option value="" disabled selected>Seleccione</option>
            @foreach ($meses as $key=>$mes)
                @if ($key == old('mes_ini', $periodo->mes_ini))
                    <option value="{{$key}}" selected>{{$mes}}</option>                    
                @else
                    <option value="{{$key}}">{{$mes}}</option>
                @endif
            @endforeach
        </select>
            <div class="input-field" style="margin-top: 8px;">
                <span id="mmes_ini" class="helper-text red-text">{{ $errors->first('mes_ini') }}</span>
            </div>
        </div>
        <div class="col s6">
            <div class="input-field">
                <label for="anio_ini">Año de Inicio</label>
                <input type="number" name="anio_ini" id="anio_ini" value="{{ old('anio_ini', $periodo->anio_ini) }}" min="2018">
                <span id="manio_ini" class="helper-text red-text">{{ $errors->first('anio_ini') }}</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s6">
            <label for="mes_fin">Mes de Finalización</label>
            <select class="browser-default" name="mes_fin" id="mes_fin" style="border: 1px solid #9e9e9e;">
            <option value="" disabled selected>Seleccione</option>
            @foreach ($meses as $key=>$mes)
                @if ($key == old('mes_fin', $periodo->mes_fin))
                    <option value="{{$key}}" selected>{{$mes}}</option>                    
                @else
                    <option value="{{$key}}">{{$mes}}</option>
                @endif
            @endforeach
        </select>
            <div class="input-field" style="margin-top: 8px;">
                <span id="mmes_fin" class="helper-text red-text">{{ $errors->first('mes_fin') }}</span>
            </div>
        </div>
        <div class="col s6">
            <div class="input-field">
                <label for="anio_fin">Año de Finalización</label>
                <input type="number" name="anio_fin" id="anio_fin" value="{{ old('anio_fin', $periodo->anio_fin) }}" min="2018">
                <span id="manio_fin" class="helper-text red-text">{{ $errors->first('anio_fin') }}</span>
            </div>
        </div>
    </div>

    <a class="waves-effect waves-light btn grey darken-1" href="{{ route('periodos.index') }}">Regresar</a>
    <button class="btn waves-effect waves-light" type="submit">Actualizar</button>
</form>
@endsection
 
@section('js')
<script>
        @if ($errors->has('titulo'))
            $("#titulo").addClass("invalid");
            $("#mtitulo").show();
        @endif
        @if ($errors->has('mes_ini'))
            $("#mes_ini").css({"border": "2px solid #F44336"});
            $("#mmes_ini").show();
        @endif
        @if ($errors->has('anio_ini'))
            $("#anio_ini").addClass("invalid");
            $("#manio_ini").show();
        @endif
        @if ($errors->has('mes_fin'))
            $("#mes_fin").css({"border": "2px solid #F44336"});
            $("#mmes_fin").show();
        @endif
        @if ($errors->has('anio_fin'))
            $("#anio_fin").addClass("invalid");
            $("#manio_fin").show();
        @endif
</script>
@endsection