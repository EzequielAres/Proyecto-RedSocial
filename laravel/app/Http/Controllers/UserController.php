<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function usuario($id) {
        return User::findOfFail($id);
    }


    public function show($id) {
        return view('userdetails', array('user' => User::findOrFail($id)));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('userconfiguracion', array('user' => User::findOrFail($id)));       
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        /* //
        // validación
        $validacion = $request->validate(array(
            'nombre' => 'required',
            'especie' => 'required'
        )); */

        $user = User::findOrFail($id);
        $user->update($request->all());
        if (isset($request->all()['image'])) {
            $imagen = Storage::putFile('avatares', $request->all()['image']);
            $user->image = $imagen;
        }
        
        $user->save();

        return redirect()->route('inicio');
    }

    public function tiempo($id) {
        $usuario = User::findOrFail($id);
        $fechaUsuario = date_create($usuario->created_at);
        $fechaActual = date_create(date('Y/m/d h:i:s'));
        $diferencia = $fechaActual->diff($fechaUsuario);

        if($diferencia->d == 0) {
            if ($diferencia->h == 0) {
                if ($diferencia->i == 0) {
                    $resultado = $diferencia->s . " segundos";
                    return response()->json(
                        array('texto' => $resultado)
                    );
                }
                $resultado = $diferencia->i . " minutos";
                return response()->json(
                    array('texto' => $resultado)
                );
            }
            $resultado = $diferencia->h . " horas";
            return response()->json(
                array('texto' => $resultado)
            );
        }

        $resultado = $diferencia->d . " días";
        return response()->json(
            array('texto' => $resultado)
        );
    }
}