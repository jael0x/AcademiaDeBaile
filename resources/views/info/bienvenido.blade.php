@extends('layout') 
@section('title', "Bienvenido") 
@section('content')
<div id="grad" class="row mg-b0">

    <img class="" src="{{ asset($imgprincipal->url) }}" width="100%">
    <div class="section purple lighten-1" style="margin-top: 10px;">
        <div class="container">
            <h3 class="center-align white-text">Ninette Academia de Baile</h3>
            <h6 class="quote center-align white-text">"Los grandes bailarines son grandes por su TÉCNICA,<br>pero aún más por su PASIÓN"</h6>
            <p class="justify white-text">
                Con el método de la Escuela Cubana de Ballet una de las más prestigiosas a nivel mundial. Talleres de diversos estilos danzarios dentro de todo el año. Fomentando la puntualidad y respeto, con metodologías óptimas de enseñanza de las mejores escuelas del país, con experiencia en competencias nacionales e internacionales y habilidades de manejo y organizacional.
            </p>
        </div>
    </div>

        <div class="col s12 m6 pd-0">
            {{-- <div class="section pink lighten-2"> --}}
            <div class="section pink lighten-2">
                <a href="/cursos">
                    <img class="responsive-img rounded z-depth-2 center-img" src="{{$imgcursos->url}}">
                    <h5 class="start white-text center">Cursos</h5>
                    <div class="card-panel">
                        <blockquote class="blockquote"><p class="black-text">Clases para niños y adolescentes de 3 a 17 años y para jóvenes y adultos.</p></blockquote>
                    </div>
                </a>
            </div>
        </div>
        <div class="col s12 m6 pd-0">
            <div class="section cyan lighten-1">
                <a href="/noticiasyeventos">
                    <img class="responsive-img rounded z-depth-2 center-img" src="{{$imgnotieven->url}}">
                    <h5 class="start white-text center">Noticias y Eventos</h5>
                    <div class="card-panel ">
                        <blockquote class="blockquote"><p class="black-text">Infórmese de las últimas noticias y próximos acontecimientos.</p></blockquote>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection