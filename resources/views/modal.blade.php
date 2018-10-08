@extends('admin.layout') 
@section('content')
<button id="fire-modal">Open Modal</button>

<div id="my-modal" class="my-modal">
    <div class="card grey lighten-2 modal-card">
        <div class="card-content">
            <span class="card-title red-text">Advertencia! <i class="fas fa-exclamation-triangle"></i></span>
            <p>Está seguro de borrar este elemento?</p>
        </div>
        <div class="card-action bet">
            <a href="" style="font-size: 15px;" class="black-text">Cancelar <i class="fas fa-times"></i></a>
            <a href="" style="font-size: 15px;" class="red-text">Borrar <i class="fas fa-trash-alt"></i></a>
        </div>
    </div>
</div>
@endsection
 
@section('js')
<script>
    var modal = document.getElementById("my-modal");
    var firemodal = document.getElementById("fire-modal");

    firemodal.onclick = function() {
        modal.style.display = "block";
    }
    modal.onclick = function(){
        modal.style.display = "none";
    }
</script>
@endsection