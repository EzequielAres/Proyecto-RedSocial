@extends('layouts.app')

@section('content')
<form style="width: 40%;margin:auto;" class="card" method="POST" enctype="multipart/form-data" action="">
    <div class="card-header">
        <h4 class="card-title">Subir nueva imagen</h4>
    </div>
    <div class="card-body" style="text-align: center">
        @csrf
        <p><label for="image_path">Imagen</label>
        <input style="width: 20vw;margin-left: 2.3vw;" type="file" name="image_path"></p>
        <div style="display: flex;justify-content: center;flex-wrap: wrap;">
            <label for="description">Descripción</label>
            <textarea style="width: 20vw;margin-left: 1vw;" name="description" rows="2"></textarea>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <p><input style="margin-right: 9.2vw;margin-top: 1vh;" class="btn btn-primary" type="submit" value="Subir imagen"></p>
    </div>
</form>
@endsection