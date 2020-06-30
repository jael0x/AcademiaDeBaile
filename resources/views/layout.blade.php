<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>@yield('title') - Ninette Academia</title>

  <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/style.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}" media="screen,projection" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
  @include('navbar')
  <main> 
    @yield('content')
  </main>
  @include('footer')

  {{-- <script type="text/javascript" src="{{ asset('materialize/js/materialize.min.js') }}"></script> --}}
  <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  @yield('js')
  @yield('js-pres')
</body>

</html>