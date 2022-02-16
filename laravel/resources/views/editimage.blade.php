@extends('layouts.app')

@section('content')
<form style="width: 40%;margin:auto;" class="card" method="POST" enctype="multipart/form-data" action="">
    <div class="card-header">
        <h4 class="card-title">Editar imagen:</h4>
    </div>
    <div class="card-body" style="text-align: center">
        @csrf
        <div style="display: flex;justify-content: center;flex-wrap: wrap;">
            <label for="description">Descripción</label>
            <textarea style="width: 20vw;margin-left: 1vw;" name="description" rows="3">{{ $imagen->description }}</textarea>
        </div>
        <p><input style="margin-right: 8vw;margin-top: 1vh;" class="btn btn-primary" type="submit" value="Guardar cambios"></p>
    </div>
</form>
@endsection