@extends('admin.layout') 
@section('title', $title) 
@section('content')

<div class="bet">
    <h5>{{ $title }}</h5>
    <a href="{{ route('tipos.create') }}" class="waves-effect waves-light btn">Crear Tipo de Evento</a>
</div>

@if ($tipos->isNotEmpty())
<table class="highlight" style="max-width: 100%;">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Título</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tipos as $tipo)
        <tr>
            <td>{{ $tipo->id }}</td>
            <td>{{ $tipo->titulo }}</td>
            <td class="center edit-sec">
            @if ($tipo->id != 1)
                    <a href="{{ route('tipos.edit', $tipo) }}" class="btn-floating btn-small waves-effect waves-light light-blue"><i class="fas fa-pencil-alt"></i></a>
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay tipos de evento registrados</p>
@endif
@endsection