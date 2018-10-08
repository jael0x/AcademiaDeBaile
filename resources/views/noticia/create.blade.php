@extends('admin.layout') 
@section('title', $title) 
@section('content')
<h5>{{ $title }}</h5>

@if ($errors->any())
    <h6 class="red-text">Por favor corrija los siguientes errores:</h6>
@endif

    <form method="POST" action="{{ url('admin/noticias/create') }}">
        {{ csrf_field() }} {{-- proteccion --}}
        <div class="input-field">
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
            <label for="titulo">Título</label>
            <span id="mtitulo" class="helper-text red-text">{{ $errors->first('titulo') }}</span>
        </div>

        <div class="input-field">
            <textarea class="materialize-textarea" type="text" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
            <label for="descripcion">Contenido</label>
            <span id="mdescripcion" class="helper-text red-text">{{ $errors->first('descripcion') }}</span>
        </div>

        <div class="input-field">
            <input type="text" name="img_url" id="img_url" value="{{ old('img_url') }}">
            <label for="img_url">Imagen</label>
        </div>

        <a class="waves-effect waves-light btn grey darken-1" href="{{ route('noticias.index') }}">Regresar</a>
        <button class="btn waves-effect waves-light" type="submit">Crear</button>
    </form>
@endsection

@section('js')
    <script>
        @if ($errors->has('titulo'))
            $("#titulo").addClass("invalid");
            $("#mtitulo").show();
        @endif
        @if ($errors->has('descripcion'))
            $("#descripcion").addClass("invalid");
            $("#mdescripcion").show();
        @endif
    </script>
@endsection