<ul id="sidenav-admin" class="my-sidenav z-depth-3">
    <li><a href="/admin" class="collapsible-header waves-effect amber-text text-darken-4">Inicio</a></li>
    <hr style=" border-top: 1px solid #e0e0e0;">
    <li><a href="/admin/cursos" class="collapsible-header waves-effect amber-text text-darken-4">Cursos</a></li>
    <li><a href="/admin/noticias" class="collapsible-header waves-effect amber-text text-darken-4">Noticias</a></li>
    <li><a href="/admin/eventos" class="collapsible-header waves-effect amber-text text-darken-4">Eventos</a></li>
    <hr style=" border-top: 1px solid #e0e0e0;">
    {{-- <li><a href="" class="collapsible-header waves-effect amber-text text-darken-4">Inscripciones</a></li> --}}
    {{-- <li><a href="" class="collapsible-header waves-effect amber-text text-darken-4">Pagos</a></li> --}}
    <li><a href="/admin/docentes" class="collapsible-header waves-effect amber-text text-darken-4">Docentes</a></li>
    {{-- <li><a href="" class="collapsible-header waves-effect amber-text text-darken-4">Estudiantes</a></li> --}}
    <hr style=" border-top: 1px solid #e0e0e0;">
    <li><a href="/admin/teatros" class="collapsible-header waves-effect amber-text text-darken-4">Teatros</a></li>
    <li><a href="/admin/periodos" class="collapsible-header waves-effect amber-text text-darken-4">Periodos</a></li>
    <li><a href="/admin/tipos" class="collapsible-header waves-effect amber-text text-darken-4">Tipos de Eventos</a></li>
</ul>

<div class="navbar">
    <nav class="white nav-extended z-depth-0">
        <div class="nav-wrapper">
            <a id="fire-sidenav" class="sidenav-trigger amber-text text-darken-4">&#9776</a>
            <ul class="right">
                <li><a class="btn waves-effect red lighten-1" href="/">Salir</a></li>
            </ul>
        </div>
    </nav>
</div>


@section('js-admin')
<script>
    var sidenav = document.getElementById("sidenav-admin");
    var firesidenav = document.getElementById("fire-sidenav");

    window.onclick = function(event) {
        if (event.target != sidenav) {
            sidenav.style.display = "none";
        } 
        if (event.target == firesidenav){
            sidenav.style.display = "block";
        }
    }
</script>
@endsection