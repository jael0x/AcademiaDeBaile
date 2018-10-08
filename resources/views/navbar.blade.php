<div class="navbar-fixed">
  <nav class="white nav-extended z-depth-1">
    <div class="nav-wrapper">
      <a href="/" class="brand-logo">
        <img src="{{ asset('img/logo1.jpg') }}" alt="" width="150px">
      </a>
      <a id="fire-sidenav" class="sidenav-trigger amber-text text-darken-4">&#9776</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="nava amber-text text-darken-4 active waves-effect" href="/">Bienvenido</a></li>
        <li><a class="nava amber-text text-darken-4 waves-effect" href="/nosotros">Acerca de Nosotros</a></li>
        <li><a class="nava amber-text text-darken-4 waves-effect" href="/cursos">Cursos</a></li>
        <li><a class="nava amber-text text-darken-4 waves-effect" href="/noticiasyeventos">Noticias y Eventos</a></li>
        <li><a class="nava amber-text text-darken-4 waves-effect" href="/multimedia">Multimedia</a></li>
      </ul>
    </div>
  </nav>
</div>

<ul id="sidenav-pres" class="my-sidenav z-depth-3">
    <li><a class="collapsible-header amber-text text-darken-4 waves-effect" href="/">Bienvenido</a></li>
    <li><a class="collapsible-header amber-text text-darken-4 waves-effect" href="/nosotros">Acerca de Nosotros</a></li>
    <li><a class="collapsible-header amber-text text-darken-4 waves-effect" href="/cursos">Cursos</a></li>
    <li><a class="collapsible-header amber-text text-darken-4 waves-effect" href="/noticiasyeventos">Noticias y Eventos</a></li>
    <li><a class="collapsible-header amber-text text-darken-4 waves-effect" href="/multimedia">Multimedia</a></li>
</ul>

@section('js-pres')
<script>
    var sidenav = document.getElementById("sidenav-pres");
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