@extends('admin.layout') 
@section('title', $title) 
@section('content')
<h5>{{ $title }}</h5>

@if ($errors->any())
<h6 class="red-text">Por favor corrija los siguientes errores:</h6>
@endif

<form method="POST" action="{{ url("/admin/docentes/edit/{$docente->id}") }}">
    {{ method_field('PUT') }}        
    {{ csrf_field() }}
    <div class="input-field">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $docente->nombre) }}">
        <span id="mnombre" class="helper-text red-text">{{ $errors->first('nombre') }}</span>
    </div>

    <div class="input-field">
        <label for="cedula">Cédula</label>
        <input type="text" name="cedula" id="cedula" value="{{ old('cedula', $docente->cedula) }}">
        <span id="mcedula" class="helper-text red-text">{{ $errors->first('cedula') }}</span>
    </div>

            <label for="fecha_ingreso" class="active">Fecha del Evento</label>
            <div class="input-field" style="margin-top: 0;">
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="{{ old('fecha_ingreso', $docente->fecha_ingreso->format('Y-m-d')) }}">
                <span id="mfecha_ingreso" class="helper-text red-text">{{ $errors->first('fecha_ingreso') }}</span>
            </div>

    <a class="waves-effect waves-light btn grey darken-1" href="{{ route('docentes.index') }}">Regresar</a>
    <button class="btn waves-effect waves-light" type="submit">Actualizar</button>
</form>
@endsection
 
@section('js')
<script>
    @if ($errors->has('nombre'))
            $("#nombre").addClass("invalid");
            $("#mnombre").show();
        @endif
        @if ($errors->has('cedula'))
            $("#cedula").addClass("invalid");
            $("#mcedula").show();
        @endif
        @if ($errors->has('fecha_ingreso'))
            $("#fecha_ingreso").addClass("invalid");
            $("#mfecha_ingreso").show();
        @endif
</script>
@endsection