@extends('layouts.app')

@section('content')

<html>
<head>
    <title>Inicio</title>
</head>
<body>
       

        @foreach ($likes as $like)
            <div class="card" style="width: 50%;margin: auto;margin-top:4vh;">
                <div class="card-header">   
                    <h5 class="card-title"> <img class="rounded-circle avatar" src="{{ $like->imagen->usuario->image != 'null' ? "/private/" .  $like->imagen->usuario->image : '/storage/anon.png' }}" alt=""> 
                        {{ $like->imagen->usuario->name . " " . $like->imagen->usuario->surname . " | "}} <span style="color:gray"> {{ "@" . $like->imagen->usuario->nick }} </span></h5>
                </div>
                <a style="margin-left: -8px;margin-top: -8px;margin-right: -8px;" href="{{ route('imagen', array('id' => $like->image_id))}}">
                    <img class="card-img-top p-2" src="{{ "/private/" . $like->imagen->image_path }}" alt="">
                </a>
                <div class="card-body">

                    <p class="card-text" style="color:gray">{{ "@" . $like->imagen->usuario->nick . " | "}} Hace 
                        <span onload="tiempoImagen(this)" id="tiempoImagen{{ $like->imagen->id }}" data-id="{{ $like->imagen->id }}" user-id="{{ Auth::user()->id }}">a</span></p>

                        <script>
                            tiempoImagen{{ $like->imagen->id }}.addEventListener('load', tiempoImagen(tiempoImagen{{ $like->imagen->id }}), false);
                        </script>

                    <p class="card-text">{{ $like->imagen->description }}</p>
                    
                    @if ($likes->contains('user_id', Auth::user()->id))
                        <i class="fas fa-heart" onclick="alterna_like(this)" data-id="{{ $like->imagen->id }}" id="likes{{ $like->imagen->id }}">{{ $like->imagen->like->count() }}</i><span></span>
                    @else
                        <i class="far fa-heart" onclick="alterna_like(this)" data-id="{{ $like->imagen->id }}" id="likes{{ $like->imagen->id }}">{{ $like->imagen->like->count() }}</i><span></span>
                    @endif

                    <!--<p class="card-text">Comentarios ({{  count($like->imagen->comentarios) }})</p>-->
                    <button style="margin-bottom: 2vh" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapse{{ $like->image_id }}" aria-expanded="false" aria-controls="collapseExample">
                        Comentarios ({{ count($like->imagen->comentarios) }})
                      </button>

                    <div class="collapse" id="collapse{{ $like->image_id }}">
                        @foreach ($like->imagen->comentarios as $comentario)
                            <p class="card-text" style="color:gray">{{ "@" . $comentario->usuario->nick }}</p>
                            <p class="card-text">{{ $comentario->content }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <div style="display: flex;justify-content: center;margin-top: 2vh;">
            {{ $likes->links() }}
        </div>
    @endsection
    </body>
</html>