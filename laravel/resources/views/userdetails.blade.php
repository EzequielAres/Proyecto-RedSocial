<html>
<head>
    <title>Mi perfil</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

        <div class="card-header" style="width: 50%;margin: auto;margin-top:4vh;display: flex;align-items: center;">
            <img style="width:10vw" class="rounded-circle avatar" src="{{ Auth::user()->image != 'null' ? "/private/" . Auth::user()->image : "/storage/anon.png" }}">
            <div style="margin-left:1vw;">
                <h3>{{ "@" . Auth::user()->nick }}</h3>
                <h3>{{ Auth::user()->name . " " . Auth::user()->surname }}</h3>
                <h6>Se unió hace: <span id="tiempoUsuario{{ Auth::user()->id }}" data-id="{{ Auth::user()->id }}">sdf</span></h6>

                <script>
                    tiempoUsuario{{ Auth::user()->id }}.addEventListener('load', tiempoUsuario(tiempoUsuario{{ Auth::user()->id }}), false);
                </script>
            </div>
        </div>
        
        @foreach ($imagenes as $imagen)
            <div class="card" style="width: 50%;margin: auto;margin-top:4vh;">
                <div class="card-header">   
                    <h5 class="card-title"> <img class="rounded-circle avatar" src="{{ $imagen->usuario->image != 'null' ? "/private/" .  $imagen->usuario->image : '/storage/anon.png' }}" alt=""> 
                        {{ $imagen->usuario->name . " " . $imagen->usuario->surname . " | "}} <span style="color:gray"> {{ "@" . $imagen->usuario->nick }} </span></h5>
                </div>
                <a style="margin-left: -8px;margin-top: -8px;margin-right: -8px;" href="{{ route('imagen', array('id' => $imagen->id))}}">
                    <img class="card-img-top p-2" src="{{ "/private/" . $imagen->image_path }}" alt="">
                </a>
                <div class="card-body">
                    <p class="card-text" style="color:gray">{{ "@" . $imagen->usuario->nick . " | "}} Hace 
                        <span onload="tiempoImagen(this)" id="tiempoImagen{{ $imagen->id }}" data-id="{{ $imagen->id }}" user-id="{{ Auth::user()->id }}">a</span></p>

                        <script>
                            tiempoImagen{{ $imagen->id }}.addEventListener('load', tiempoImagen(tiempoImagen{{ $imagen->id }}), false);
                        </script>
                        
                    <p class="card-text">{{ $imagen->description }}</p>
                    
                    <i class="far fa-heart" data-id="{{ $imagen->id }}" data-likes=" 0" id="likes{{ $imagen->id }}"></i><span>{{ $imagen->like()->count() }}</span>
                    
                    <!--<p class="card-text">Comentarios ({{  count($imagen->comentarios) }})</p>-->
                    <button style="margin-bottom: 2vh" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapse{{ $imagen->id }}" aria-expanded="false" aria-controls="collapseExample">
                        Comentarios ({{ count($imagen->comentarios) }})
                      </button>

                    <div class="collapse" id="collapse{{ $imagen->id }}">
                        @foreach ($imagen->comentarios as $comentario)
                            <p class="card-text" style="color:gray">{{ "@" . $comentario->usuario->nick }}</p>
                            <p class="card-text">{{ $comentario->content }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <div style="display: flex;justify-content: center;margin-top: 2vh;">
            {{ $imagenes->links() }}
        </div>
    @endsection
    </body>
</html>