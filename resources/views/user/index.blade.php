@extends('admin.layout') 
@section('title', $title) 
@section('content')

<div class="bet">
    <h5>{{ $title }}</h5>
    <a href="{{ route('register') }}" class="waves-effect waves-light btn">Ingresar Administrador</a>
</div>

@if ($users->isNotEmpty())
<table class="highlight" style="max-width: 100%;">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr style="cursor: pointer;" onclick="document.location='{{ route('users.detail', $user) }}'">
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{$user->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay users registrados</p>
@endif
@endsection