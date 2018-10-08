@extends('admin.layout') 
@section('title', $title) 
@section('content')
<h5>{{ $title }}</h5>

@if ($errors->any())
    <h6 class="helerp-text red-text">Por favor corrija los siguientes errores:</h6>
@endif

    <form method="POST" action="{{ url("/admin/tipos/edit/{$tipo->id}") }}">
        {{ method_field('PUT') }}        
        {{ csrf_field() }} {{-- proteccion --}}
        <div class="input-field">
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $tipo->titulo) }}">
            <label for="titulo">Título</label>
            <span id="mtitulo" class="helper-text red-text">{{ $errors->first('titulo') }}</span>
        </div>

        <a class="waves-effect waves-light btn grey darken-1" href="{{ route('tipos.index') }}">Regresar</a>
        <button id="btn-act" class="btn waves-effect waves-light" type="submit">Actualizar</button>
    </form>
@endsection

@section('js')
    <script>
        @if ($errors->has('titulo'))
            $("#titulo").addClass("invalid");
            $("#mtitulo").show();
        @endif
        @if ($tipo->id == 1)
            $("#titulo").prop( "disabled", true );
            $("#btn-act").prop( "disabled", true );
        @endif
    </script>
@endsection