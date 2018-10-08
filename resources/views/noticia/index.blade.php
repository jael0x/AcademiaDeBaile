@extends('admin.layout') 
@section('title', $title) 
@section('content')

<div class="bet">
    <h5>{{ $title }}</h5>
    <a href="{{ route('noticias.create') }}" class="waves-effect waves-light btn">Crear Noticia</a>
</div>

@if ($noticias->isNotEmpty())
<table class="highlight" style="max-width: 100%;">
    <thead>
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Fecha</th>
            <th scope="col" class="hide-on-small-only">Contenido</th>
            <th scope="col">Imagen</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($noticias as $notieven)
        <tr style="cursor: pointer;" onclick="document.location='{{ route('noticias.detail', $notieven) }}'">
            <td>{{ $notieven->titulo }}</td>
            <td>{{ $notieven->fecha }}</td>
            <td class="hide-on-small-only">
                <div class="description"><span class="justify">{{ $notieven->descripcion }}</span></div>
            </td>
            <td><img src="{{$notieven->img_url}}" alt="" width="100px"></td>
            <td class="center edit-sec">
                <a href="{{ route('noticias.edit', $notieven) }}" class="btn-floating btn-small waves-effect waves-light light-blue"><i class="fas fa-pencil-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay noticias registradas</p>
@endif
@endsection