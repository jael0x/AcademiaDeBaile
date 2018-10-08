@extends('admin.layout') 
@section('title', $title) 
@section('content')

<div class="bet">
    <h5>{{ $title }}</h5>
    <a href="{{ route('docentes.create') }}" class="waves-effect waves-light btn">Ingresar Docente</a>
</div>

@if ($docentes->isNotEmpty())
<table class="highlight" style="max-width: 100%;">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col" class="hide-on-small-only">Cédula</th>
            <th scope="col">Fecha de Ingreso</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($docentes as $docente)
        <tr style="cursor: pointer;" onclick="document.location='{{ route('docentes.detail', $docente) }}'">
            <td>{{ $docente->nombre }}</td>
            <td>{{ $docente->cedula }}</td>
            <td>{{$docente->fecha_ingreso->day}} de {{$docente->fecha_ingreso->format('F')}} del {{$docente->fecha_ingreso->year}}</td>
            <td class="center edit-sec">
                <a href="{{ route('docentes.edit', $docente) }}" class="btn-floating btn-small waves-effect waves-light light-blue"><i class="fas fa-pencil-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay docentes registrados</p>
@endif
@endsection