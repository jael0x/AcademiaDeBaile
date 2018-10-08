@extends('admin.layout') 
@section('title', $title) 
@section('content')

<div class="bet">
    <h5>{{ $title }}</h5>
    <a href="{{ route('teatros.create') }}" class="waves-effect waves-light btn">Ingresar Teatro</a>
</div>

@if ($teatros->isNotEmpty())
<table class="highlight" style="max-width: 100%;">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Dirección</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teatros as $teatro)
        <tr style="cursor: pointer;" onclick="document.location='{{ route('teatros.detail', $teatro) }}'">
            <td>{{ $teatro->nombre }}</td>
            <td>{{ $teatro->direccion }}</td>
            <td class="center edit-sec">
                <a href="{{ route('teatros.edit', $teatro) }}" class="btn-floating btn-small waves-effect waves-light light-blue"><i class="fas fa-pencil-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay teatros registrados</p>
@endif
@endsection