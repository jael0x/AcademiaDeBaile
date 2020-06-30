<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>@yield('title') Administración</title>

  <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/style.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}" media="screen,projection" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
  
<div class="navbar">
  <nav class="white nav-extended z-depth-0">
      <div class="nav-wrapper">
          <ul class="right">
              <li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="btn waves-effect red lighten-1" href="/logout" style="margin: 0 15px;">Salir</button>
                  </form>
              </li>
          </ul>
      </div>
  </nav>
</div>
  <main>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l11 offset-l2">
              @yield('content')
            </div>
        </div>
    </div>
  </main>
  @include('admin.footer')

  <script type="text/javascript" src="{{ asset('materialize/js/materialize.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  @yield('js')
  @yield('js-admin')
</body>

</html>