@extends('admin.layout') 
@section('title', $title) 
@section('content')
<h5>{{ $title }}</h5>

@if ($errors->any())
    <h6 class="red-text">Por favor corrija los siguientes errores:</h6>
@endif

    <form method="POST" action="{{ url('admin/tipos/create') }}">
        {{ csrf_field() }} {{-- proteccion --}}
        <div class="input-field">
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
            <label for="titulo">Título</label>
            <span id="mtitulo" class="helper-text red-text">{{ $errors->first('titulo') }}</span>
        </div>

        <a class="waves-effect waves-light btn grey darken-1" href="{{ route('tipos.index') }}">Regresar</a>
        <button class="btn waves-effect waves-light" type="submit">Crear</button>
    </form>
    <p class="orange-text text-darken-4">Nota: Los tipos de evento que cree no se podrán borrar</p>
@endsection

@section('js')
    <script>
        @if ($errors->has('titulo'))
            $("#titulo").addClass("invalid");
            $("#mtitulo").show();
        @endif
    </script>
@endsection