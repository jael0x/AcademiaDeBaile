@extends('layout') 
@section('title', "Bienvenido") 
@section('content')
<div id="grad" class="row mg-b0">

        <img class="" src="{{ asset('img/pres.jpg') }}" width="100%">
    <div class="section purple lighten-1" style="margin-top: 10px;">
        <div class="container">
            <h3 class="center-align white-text">Ninette Academia de Baile</h3>
            <h6 class="quote center-align white-text">"Los grandes bailarines son grandes por su TÉCNICA,<br>pero aún más por su PASIÓN"</h6>
            <p class="justify white-text">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia sunt vel nostrum unde facere dolorum tempore possimus ut,
                eos accusantium sint aliquam iusto aut quas quae aliquid necessitatibus at ipsa. Lorem ipsum dolor sit amet,
                consectetur adipisicing elit. Eius sequi qui laudantium voluptate commodi quis asperiores ullam enim rerum
                pariatur culpa animi, voluptatem in excepturi natus quaerat placeat libero id. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Ipsam, magni amet? Inventore tempora, ut voluptas esse atque earum praesentium
                consequatur deleniti doloribus optio aut blanditiis, aspernatur voluptate est? Provident, ab.
            </p>
        </div>
    </div>

        <div class="col s12 m6 pd-0">
            {{-- <div class="section pink lighten-2"> --}}
            <div class="section pink lighten-2">
                <a href="/cursos">
                    <img class="responsive-img rounded z-depth-2 center-img" src="https://source.unsplash.com/{{ rand(1200, 900) }}x{{ rand(750, 600) }}/?ballet">
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
                    <img class="responsive-img rounded z-depth-2 center-img" src="https://source.unsplash.com/{{ rand(1200, 900) }}x{{ rand(750, 600) }}/?ballet">
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