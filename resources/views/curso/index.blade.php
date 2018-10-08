@extends('admin.layout') 
@section('title', $title) 
@section('content')

<div class="bet">
    <h5>{{ $title }}</h5>
    <a href="{{ route('cursos.create') }}" class="waves-effect waves-light btn">Crear Curso</a>
</div>

@if ($cursos->isNotEmpty())
<table class="highlight" style="max-width: 100%;">
    <thead>
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Rango</th>
            <th scope="col">Costo Mensual</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cursos as $curso)
        <tr style="cursor: pointer;" onclick="document.location='{{ route('cursos.detail', $curso) }}'">
            <td>{{ $curso->titulo }}</td>
            <td>                
                @if ($curso->edad_max < 70)
                    <h6>de {{$curso->edad_min}} a {{$curso->edad_max}} años</h6>
                @else
                    <h6>mayores de {{$curso->edad_min}} años</h6>
                @endif
            </td>
            <td>{{ $curso->precio_mensual }}</td>
            <td class="center edit-sec">
                <a href="{{ route('cursos.edit', $curso) }}" class="btn-floating btn-small waves-effect waves-light light-blue"><i class="fas fa-pencil-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay cursos registrados</p>
@endif
@endsection