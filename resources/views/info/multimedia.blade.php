@extends('layout') 
@section('title', $title) 
@section('content')
    {{-- {{dd($media)}} --}}
    <div class="container">
    <h3>{{$title}}</h3>
        <div class="row">
            @foreach ($media as $pic)
                @if ($pic->type == 'image')
                    <div class="col s6 m4 l3">
                        <div class="insta-cont">
                            @isset($pic->caption->text)
                                <div class="middle">
                                    <p class="text-center">{{$pic->caption->text}}</p>
                                </div>
                                <img src="{{$pic->images->low_resolution->url}}" onclick="firemodal('{{$pic->images->standard_resolution->url}}', 'image', '{{$pic->images->standard_resolution->height}}', '{{$pic->caption->text}}');">
                            @else
                                <img src="{{$pic->images->low_resolution->url}}" onclick="firemodal('{{$pic->images->standard_resolution->url}}', 'image', '{{$pic->images->standard_resolution->height}}', '');">
                            @endisset
                        </div>
                    </div>
                @endif
                @if ($pic->type == 'carousel')
                    @foreach ($pic->carousel_media as $picar)
                        <div class="col s6 m4 l3">
                            <div class="insta-cont">
                                @isset($pic->caption->text)
                                    <div class="middle">
                                        <p class="text-center">{{$pic->caption->text}}</p>
                                    </div>
                                    <img src="{{$picar->images->low_resolution->url}}" onclick="firemodal('{{$picar->images->standard_resolution->url}}', 'image', '{{$pic->images->standard_resolution->height}}', '{{$pic->caption->text}}');">
                                @else
                                    <img src="{{$picar->images->low_resolution->url}}" onclick="firemodal('{{$picar->images->standard_resolution->url}}', 'image', '{{$pic->images->standard_resolution->height}}', '');">
                                @endisset
                            </div>
                        </div>
                    @endforeach
                @endif
                @if ($pic->type == 'video')
                    <div class="col s6 m4 l3">
                        <div class="insta-cont">
                            <div class="icon-center"><i class="fas fa-play"></i></div>
                                @isset($pic->caption->text)
                                    <div class="middle">
                                        <p class="text-center">{{$pic->caption->text}}</p><i class="fas fa-play"></i>
                                    </div>
                                    <img src="{{$pic->images->low_resolution->url}}" onclick="firemodal('{{$pic->videos->standard_resolution->url}}', 'video', '{{$pic->videos->standard_resolution->height}}', '{{$pic->caption->text}}');">
                                @else
                                <img src="{{$pic->images->low_resolution->url}}" onclick="firemodal('{{$pic->videos->standard_resolution->url}}', 'video', '{{$pic->videos->standard_resolution->height}}', '');">
                                @endisset
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        {{-- Modales --}}

        <div id="my-modal" class="my-modal">
                <img class="responsive-img z-depth-2s" id="imgModal" src="" alt="imagen">
            <div class="text-modal">
                <p id="text-modal"></p>
            </div>
        </div>

        <div id="my-modal-vid" class="my-modal-vid">`
                <div class="video-container">
                    <iframe id="vidModal" src="" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="text-modal">
                    <p id="vid-text-modal"></p>
                </div>
        </div>
@endsection

@section('js')
    <script>
        var modalImg = document.getElementById("my-modal");
        var imgModal = document.getElementById("imgModal");

        var modalVid = document.getElementById("my-modal-vid");
        var vidModal = document.getElementById("vidModal");
        
        var textModal = document.getElementById("text-modal");
        var vidtextModal = document.getElementById("vid-text-modal");

        //360 640 800

        function firemodal(url, type, height, text){
            if (type == "image") {
                imgModal.src = url;
                modalImg.style.display = "block";
                textModal.textContent = text;
            } else {
                vidModal.src = url;
                modalVid.style.display = "block";
                vidtextModal.textContent = text;
            }
            if ( parseInt(height) < 640 ){
                imgModal.classList.remove("modal-img-vertical");
                imgModal.classList.add("modal-img-horizontal");
                vidModal.classList.remove("modal-vid-vertical");
                vidModal.classList.add("modal-vid-horizontal");
            } else {
                imgModal.classList.remove("modal-img-horizontal");
                imgModal.classList.add("modal-img-vertical");
                vidModal.classList.remove("modal-vid-horizontal");
                vidModal.classList.add("modal-vid-vertical");
            }
        }

        modalImg.onclick = function(){
            modalImg.style.display = "none";
        }

        modalVid.onclick = function(){
            modalVid.style.display = "none";
        }
    </script>
@endsection