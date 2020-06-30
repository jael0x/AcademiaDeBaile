@extends('admin.layout') 
@section('title', $title) 
@section('content')

<div class="bet">
    <h5>{{ $title }}</h5>
    <a href="{{ route('eventos.create') }}" class="waves-effect waves-light btn">Crear Evento</a>
</div>

@if ($eventos->isNotEmpty())
<table class="highlight" style="max-width: 100%;">
    <thead>
        <tr>
            <th scope="col">Título</th>
            <th scope="col" class="hide-on-small-only">Tipo</th>
            <th scope="col">Fecha</th>
            <th scope="col" class="hide-on-med-and-down">Hora</th>
            <th scope="col">Teatro</th>
            <th scope="col" class="hide-on-small-only">Precio</th>
            <th scope="col" class="hide-on-med-and-down">Imagen</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($eventos as $notieven)
        <tr style="cursor: pointer;" onclick="document.location='{{ route('eventos.detail', $notieven) }}'">
            <td>{{ $notieven->titulo }}</td>
            <td class="hide-on-small-only">{{ $notieven->tipo->titulo }}</td>
            <td>{{$notieven->fecha_eve->day}} de {{$notieven->fecha_eve->format('F')}}</td>
            <td class="hide-on-med-and-down">{{date('G:i', strtotime($notieven->hora_eve))}}</td>
            <td>{{ $notieven->teatro->nombre }}</td>
            <td class="hide-on-small-only">${{ $notieven->precio }}</td>
            <td class="hide-on-med-and-down"><img src="{{asset($notieven->img_url)}}" alt="" width="100px"></td>
            <td class="center edit-sec">
                <a href="{{ route('eventos.edit', $notieven) }}" class="btn-floating btn-small waves-effect waves-light light-blue"><i class="fas fa-pencil-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay eventos registrados</p>
@endif
@endsection