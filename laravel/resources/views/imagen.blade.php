@extends('layouts.app')

@section('content')

<html>
<head>
    <title>Inicio</title>
</head>
<body>
        <div class="card" style="width: 50%;margin: auto;margin-top:4vh;">
            <div class="card-header">   
                <h5 class="card-title"> <img class="rounded-circle avatar" src="{{ $imagen->usuario->image != 'null' ? "/private/" .  $imagen->usuario->image : '/storage/anon.png' }}" alt=""> 
                    {{ $imagen->usuario->name . " " . $imagen->usuario->surname . " | "}} <span style="color:gray"> {{ "@" . $imagen->usuario->nick }} </span></h5>
            </div>
            <img class="card-img-top" src="{{ "/private/" . $imagen->image_path }}" alt="jaja">
            <div class="card-body">
                <p class="card-text" style="color:gray">{{ "@" . $imagen->usuario->nick . " | "}} Hace 
                    <span onload="tiempoImagen(this)" id="tiempoImagen{{ $imagen->id }}" data-id="{{ $imagen->id }}" user-id="{{ Auth::user()->id }}">a</span></p>

                    <script>
                        tiempoImagen{{ $imagen->id }}.addEventListener('load', tiempoImagen(tiempoImagen{{ $imagen->id }}), false);
                    </script>                
                
                
                <p class="card-text">{{ $imagen->description }}</p>
                
                @if ($imagen->usuario->id == Auth::user()->id)
                    <i class="far fa-heart" id="likes{{ $imagen->id }}">{{ $imagen->like()->count() }}</i><span></span>  
                @else
                    @if ($imagen->like->contains('user_id', Auth::user()->id))
                        <i class="fas fa-heart" onclick="alterna_like(this)" data-id="{{ $imagen->id }}" id="likes{{ $imagen->id }}">{{ $imagen->like()->count() }}</i><span></span>
                    @else
                        <i class="far fa-heart" onclick="alterna_like(this)" data-id="{{ $imagen->id }}" id="likes{{ $imagen->id }}">{{ $imagen->like()->count() }}</i><span></span>
                    @endif
                @endif
                
                @if($imagen->user_id == Auth::user()->id)
                    <a class="btn btn-sm btn-primary" style="color:white; margin-bottom: 2vh;" href="{{ route('editimage', array('id' => $imagen->id)) }}">
                        Actualizar
                    </a>

                    <!-- Button trigger modal borrado Imagen -->
                    <button type="button" style="margin-bottom: 2vh;" class="btn btn-sm btn-danger separarBottom" data-toggle="modal" data-target="#borrarModal{{ $imagen->id }}">
                        Eliminar
                    </button>
                @endif


                <h4 class="card-text">Comentarios ({{ count($imagen->comentarios) }})</h4>
                <hr>

                <form method="POST" enctype="multipart/form-data" action="">
                    @csrf
                    <input type="hidden" name="image_id" value="{{ $imagen->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <textarea name="content" cols="100%" rows="3"></textarea>
                    <input style="margin-top:2vh;" class="btn btn-sm btn-success" type="submit" value="Enviar">
                </form>

                <hr>
                @foreach ($imagen->comentarios as $comentario)
                    <p class="card-text" style="color:gray">{{ "@" . $comentario->usuario->nick }}</p>
                    <p class="card-text">{{ $comentario->content }}</p>

                    @if($comentario->user_id == Auth::user()->id || $imagen->user_id == Auth::user()->id)
                        <a style="color:white;margin-bottom: 2vh;" class="btn btn-sm btn-danger" href="{{ route('deleteComment', array('id' => $comentario->id)) }}">
                            Eliminar
                        </a>
                    @endif
                @endforeach

                <!-- Modal borrado Imagen-->
                <div class="modal fade" id="borrarModal{{ $imagen->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Si eliminas esta imagen nunca podrás recuperarla, ¿estás seguro de querer borrarla? 
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-success" data-dismiss="modal">Cancelar</button>
                            <a href="{{ route('borraimagen', array('id' => $imagen->id)) }}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Borrar definitivamente</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    </body>
</html>