@extends('admin.layout') 
@section('title', $title) 
@section('content')
<h5>{{ $title }}</h5>

@if ($errors->any())
    <h6 class="red-text">Por favor corrija los siguientes errores:</h6>
@endif

    <form method="POST" action="{{ url("admin/teatros/edit/{$teatro->id}") }}">
        {{ method_field('PUT') }}        
        {{ csrf_field() }}
        <div class="input-field">
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $teatro->nombre) }}">
            <label for="nombre">Nombre</label>
            <span id="mnombre" class="helper-text red-text">{{ $errors->first('nombre') }}</span>
        </div>

        <div class="input-field">
            <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $teatro->direccion) }}">
            <label for="direccion">Dirección</label>
            <span id="mdireccion" class="helper-text red-text">{{ $errors->first('direccion') }}</span>
        </div>

        <a class="waves-effect waves-light btn grey darken-1" href="{{ route('teatros.index') }}">Regresar</a>
        <button class="btn waves-effect waves-light" type="submit">Actualizar</button>
    </form>
@endsection

@section('js')
    <script>
        @if ($errors->has('nombre'))
            $("#nombre").addClass("invalid");
            $("#mnombre").show();
        @endif
        @if ($errors->has('direccion'))
            $("#direccion").addClass("invalid");
            $("#mdireccion").show();
        @endif
    </script>
@endsection