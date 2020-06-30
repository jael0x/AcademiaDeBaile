@extends('admin.layout') 
@section('title', $title) 
@section('content')
    <h5>{{$title}}</h5>

    <form method="POST" action="{{ url("admin/images/edit") }}" enctype="multipart/form-data">
        {{ method_field('PUT') }}        
        {{ csrf_field() }}
        
        <p>Imagen Principal</p>
        <div class="row">
            <div class="col s12 m5">
                <div class="insta-cont just-img">
                    <img id="image-pri" class="responsive-img" src="{{asset($imgprincipal->url)}}" onclick="firemodal(this);">
                </div>
            </div>
            <div class="col s12 m3">
                <div class="input-file-container">  
                    <input class="input-file" type="file" id="imgprincipal" name="imgprincipal">
                    <label tabindex="0" for="imgprincipal" class="btn light-blue white-text waves-effect waves-light z-depth-2">CAMBIAR</label>
                </div>
            </div>
        </div>
        
        <p>Imagen para Cursos</p>
        <div class="row">
            <div class="col s12 m5">
                <div class="insta-cont just-img">
                    <img id="image-cur" class="responsive-img" src="{{asset($imgcursos->url)}}" onclick="firemodal(this);">
                </div>
            </div>
            <div class="col s12 m3">
                <div class="input-file-container">  
                    <input class="input-file" type="file" id="imgcursos" name="imgcursos">
                    <label tabindex="0" for="imgcursos" class="btn light-blue white-text waves-effect waves-light z-depth-2">CAMBIAR</label>
                </div>
            </div>
        </div>
        
        <p>Imagen para Noticias y Eventos</p>
        <div class="row">
            <div class="col s12 m5">
                <div class="insta-cont just-img">
                    <img id="image-not" class="responsive-img" src="{{asset($imgnotievens->url)}}" onclick="firemodal(this);">
                </div>
            </div>
            <div class="col s12 m3">
                <div class="input-file-container">  
                    <input class="input-file" type="file" id="imgnotievens" name="imgnotievens">
                    <label tabindex="0" for="imgnotievens" class="btn light-blue white-text waves-effect waves-light z-depth-2">CAMBIAR</label>
                </div>
            </div>
        </div>
        <button id="submitbtn" class="btn waves-effect waves-light" type="submit">Guardar</button>
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
        document.getElementById("imgprincipal").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("image-pri").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        };

        document.getElementById("imgcursos").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("image-cur").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        };

        document.getElementById("imgnotievens").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("image-not").src = e.target.result;
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