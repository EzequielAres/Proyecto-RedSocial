@extends('layouts.app')

@section('content')

<form class="card" style="width: 45%;margin:auto;" method="POST" enctype="multipart/form-data" action="">
    <div class="card-header">
        <h4 class="card-title">Configuración de mi cuenta</h4>
    </div>
    <div class="card-body" style="text-align: center">
    @csrf
        <p><label for="name">Name</label>
        <input style="width: 20vw;height:4vh;margin-left: 2vw;padding-left: 0.5vw;" type="text" name="name" value="{{ $user->name }}"></p>
        <p><label for="surname">Surname</label>
        <input style="width: 20vw;height:4vh;margin-left: 1.1vw;padding-left: 0.5vw;" type="text" name="surname" value="{{ $user->surname }}"></p>
        <p><label for="nick">Nick</label>
        <input style="width: 20vw;height:4vh;margin-left: 2.7vw;padding-left: 0.5vw;" type="text" name="nick" value="{{ $user->nick }}"></p>
        <p><label for="email">Email</label>
        <input style="width: 20vw;height:4vh;margin-left: 2.4vw;padding-left: 0.5vw;" type="text" name="email" value="{{ $user->email }}"></p>
        <p><label for="image">Avatar</label>
        <input style="width: 20vw;height:4vh;margin-left: 2.2vw;" type="file" name="image" id="image"></p>
        <input style="margin-right: 8.3vw;" class="btn btn-primary" type="submit" value="Guardar cambios">
    </div>
</form>
@endsection