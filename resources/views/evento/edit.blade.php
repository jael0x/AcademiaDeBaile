@extends('admin.layout') 
@section('title', $title) 
@section('content')
<h5>{{ $title }}</h5>

@if ($errors->any())
<h6 class="red-text">Por favor corrija los siguientes errores:</h6>
@endif

<form method="POST" action="{{ url("/admin/eventos/edit/{$notieven->id}") }}" enctype="multipart/form-data">
    {{ method_field('PUT') }}        
    {{ csrf_field() }} {{-- proteccion --}}
    <div class="input-field">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $notieven->titulo) }}">
        <span id="mtitulo" class="helper-text red-text">{{ $errors->first('titulo') }}</span>
    </div>

    <label for="tipo_id">Tipo de Evento</label>
    <select class="browser-default" name="tipo_id" id="tipo_id" style="border: 1px solid #9e9e9e;">
            <option value="" disabled selected>Seleccione</option>
            @foreach ($tipos as $tipo)
                @if ($tipo->id == old('tipo_id', $notieven->tipo_id))
                    <option value="{{$tipo->id}}" selected>{{$tipo->titulo}}</option>
                @else
                    <option value="{{$tipo->id}}">{{$tipo->titulo}}</option>
                @endif
            @endforeach
        </select>
    <div class="input-field" style="margin-top: 8px;">
        <span id="mtipo_id" class="helper-text red-text">{{ $errors->first('tipo_id') }}</span>
    </div>

    <div class="row">
        <div class="col s6">
            <label for="fecha_eve" class="active">Fecha del Evento</label>
            <div class="input-field" style="margin-top: 0;">
                <input type="date" name="fecha_eve" id="fecha_eve" value="{{ old('fecha_eve', $notieven->fecha_eve->format('Y-m-d')) }}">
                <span id="mfecha_eve" class="helper-text red-text">{{ $errors->first('fecha_eve') }}</span>
            </div>
        </div>
        <div class="col s6">
            <label for="hora_eve" class="active">Hora del Evento</label>
            <div class="input-field" style="margin-top: 0;">
                <input type="time" name="hora_eve" id="hora_eve" value="{{ old('hora_eve', $notieven->hora_eve) }}">
                <span id="mhora_eve" class="helper-text red-text">{{ $errors->first('hora_eve') }}</span>
            </div>
        </div>
    </div>

    <label for="teatro_id">Teatro</label>
    <select class="browser-default" name="teatro_id" id="teatro_id" style="border: 1px solid #9e9e9e;">
            <option value="" disabled selected>Seleccione</option>
            @foreach ($teatros as $teatro)
                @if ($teatro->id == old('teatro_id', $notieven->teatro_id))
                    <option value="{{$teatro->id}}" selected>{{$teatro->nombre}}</option>
                @else
                    <option value="{{$teatro->id}}">{{$teatro->nombre}}</option>
                @endif
            @endforeach
        </select>
    <div class="input-field" style="margin-top: 8px;">
        <span id="mteatro_id" class="helper-text red-text">{{ $errors->first('teatro_id') }}</span>
    </div>

    <div class="input-field">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" value="{{ old('precio', $notieven->precio) }}">
        <span id="mprecio" class="helper-text red-text">{{ $errors->first('precio') }}</span>
    </div>

    <div class="input-field">
        <textarea class="materialize-textarea" type="text" name="descripcion" id="descripcion">{{ old('descripcion', $notieven->descripcion) }}</textarea>
        <label for="descripcion">Descripción</label>
        <span id="mdescripcion" class="helper-text red-text">{{ $errors->first('descripcion') }}</span>
    </div>

    <div class="row">
        <div class="col s6">
            <label for="docente_id">Docente</label>
            <select class="browser-default" name="docente_id" id="docente_id" style="border: 1px solid #9e9e9e;">
                        <option value="" selected>Seleccione</option>
                        @foreach ($docentes as $docente)
                            @if ($docente->id == old('docente_id', $notieven->docente_id))
                                <option value="{{$docente->id}}" selected>{{$docente->nombre}}</option>
                            @else
                                <option value="{{$docente->id}}">{{$docente->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
            <div class="input-field" style="margin-top: 8px;">
                <span id="mdocente_id" class="helper-text red-text">{{ $errors->first('docente_id') }}</span>
            </div>
        </div>
        <div class="col s6">
            <label for="periodo_id">Periodo</label>
            <select class="browser-default" name="periodo_id" id="periodo_id" style="border: 1px solid #9e9e9e;">
                        <option value="" selected>Seleccione</option>
                        @foreach ($periodos as $periodo)
                            @if ($periodo->id == old('periodo_id', $notieven->periodo_id))
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
    </div>

    <p>Imagen</p>
    <div class="row">
        <div class="col s12 m5">
            <div class="insta-cont just-img">                   
                @if ($notieven->img_url)
                    <img id="image" class="responsive-img" src="{{asset($notieven->img_url)}}" onclick="firemodal(this);">
                @else
                    <img id="image" class="responsive-img" src="{{ asset("storage/default.jpg") }}" onclick="firemodal(this);">
                @endif
            </div>
        </div>
        <div class="col s12 m3">
            <div class="input-file-container">  
                <input class="input-file" type="file" id="img_url" name="img_url">
                <label tabindex="0" for="img_url" class="btn light-blue white-text waves-effect waves-light z-depth-2">SELECCIONAR</label>
            </div>
        </div>
    </div>

    <a class="waves-effect waves-light btn grey darken-1" href="{{ route('eventos.index') }}">Regresar</a>
    <button class="btn waves-effect waves-light" type="submit">Actualizar</button>
</form>

{{-- Modal --}}
<div id="my-modal" class="my-modal">
    <div class="container">
        <img class="responsive-img z-depth-2s modal-img" id="imgModal" src="" alt="imagen">
    </div>
</div>
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
        @if ($errors->has('tipo_id'))
            $("#tipo_id").css({"border": "2px solid #F44336"});
            $("#mtipo_id").show();
        @endif
        @if ($errors->has('fecha_eve'))
            $("#fecha_eve").addClass("invalid");
            $("#mfecha_eve").show();
        @endif
        @if ($errors->has('hora_eve'))
            $("#hora_eve").addClass("invalid");
            $("#mhora_eve").show();
        @endif
        @if ($errors->has('teatro_id'))
            $("#teatro_id").css({"border": "2px solid #F44336"});
            $("#mteatro_id").show();
        @endif
        @if ($errors->has('precio'))
            $("#precio").addClass("invalid");
            $("#mprecio").show();
        @endif
        
        document.getElementById("img_url").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("image").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        };

        var modalImg = document.getElementById("my-modal");
        var imgModal = document.getElementById("imgModal");

        function firemodal(image){
            imgModal.src = image.src;
            modalImg.style.display = "block";
        }

        modalImg.onclick = function(){
            modalImg.style.display = "none";
        }
</script>
@endsection