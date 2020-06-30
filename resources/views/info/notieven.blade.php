@extends('layout') 
@section('title', $title) 
@section('content')
<div style="height: 100%;">

<div class="container" style="margin-top: 50px;">
    <div class="row">
        @foreach ($notievens as $notieven)
        <a href="{{ route('notievenshow', $notieven) }}" class="grey-text text-darken-4">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-stacked">
                        <div class="card-content" style="padding-bottom : 0;">
                            <blockquote class="blockquote" style="margin : 0;">
                            <span class="card-title" style="margin-bottom : 0;"><strong>{{$notieven->titulo}}</strong></span>
                            </blockquote>
                                <small class="grey-text text-darken-1">{{$notieven->fecha}}</small>
                                <div class="card-image">
                                    <img src="{{asset($notieven->img_url)}}">
                                </div>
                            </div>
                            <div class="card-action">
                                    <small>{{$notieven->tipo->titulo}}</small>
                            <div class="description"><span class="justify">{{$notieven->descripcion}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
</div>
@endsection