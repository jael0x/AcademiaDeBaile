@extends('admin.layout') 
@section('title', $title) 
@section('content')

<div class="bet">
    <h5>{{ $title }}</h5>
    <a href="{{ route('periodos.create') }}" class="waves-effect waves-light btn">Crear Periodo</a>
</div>

@if ($periodos->isNotEmpty())
<table class="highlight" style="max-width: 100%;">
    <thead>
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Inicio</th>
            <th scope="col">Fin</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periodos as $periodo)
        <tr style="cursor: pointer;" onclick="document.location='{{ route('periodos.detail', $periodo) }}'">
            <td>{{ $periodo->titulo }}</td>
            <td>{{$periodo->mesi}} del {{$periodo->anio_ini}}</td>
            <td>{{$periodo->mesf}} del {{$periodo->anio_fin}}</td>
            <td class="center edit-sec">
                <a href="{{ route('periodos.edit', $periodo) }}" class="btn-floating btn-small waves-effect waves-light light-blue"><i class="fas fa-pencil-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay periodos registrados</p>
@endif
@endsection