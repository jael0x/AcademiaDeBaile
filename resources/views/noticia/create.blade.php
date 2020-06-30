@extends('admin.layout') 
@section('title', $title) 
@section('content')
<h5>{{ $title }}</h5>

@if ($errors->any())
    <h6 class="red-text">Por favor corrija los siguientes errores:</h6>
@endif

    <form method="POST" action="{{ url('admin/noticias/create') }}" enctype="multipart/form-data">
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

        <p>Imagen</p>
        <div class="row">
            <div class="col s12 m5">
                <div class="insta-cont just-img">
                    <img id="image" class="responsive-img" src="{{ asset("storage/default.jpg") }}" onclick="firemodal(this);">
                </div>
            </div>
            <div class="col s12 m3">
                <div class="input-file-container">  
                    <input class="input-file" type="file" id="img_url" name="img_url">
                    <label tabindex="0" for="img_url" class="btn light-blue white-text waves-effect waves-light z-depth-2">SELECCIONAR</label>
                </div>
            </div>
        </div>

        <a class="waves-effect waves-light btn grey darken-1" href="{{ route('noticias.index') }}">Regresar</a>
        <button class="btn waves-effect waves-light" type="submit">Crear</button>
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