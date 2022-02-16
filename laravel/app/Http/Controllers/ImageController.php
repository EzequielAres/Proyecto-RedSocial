<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Image::paginate(5);
        return view("imagenes", array("imagenes" => $imagenes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('altaimagen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = new Image($request->all());
        $path = Storage::putFile('images', $request->all()['image_path']);
        $imagen->image_path = $path;
        $imagen->save();

        return redirect()->route("inicio");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagen = Image::FindOrFail($id);
        return view('imagen', array("imagen" => $imagen) );


    }

    public function imagenesUsuario($id)
    {
        $imagenes = Image::where("user_id", "=", $id)->paginate(5);
        return view('userdetails', array("imagenes" => $imagenes) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('editimage', array("imagen" => Image::findOrFail($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $image->update($request->all());
        return redirect()->route('inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen = Image::findOrFail($id);
        $imagen->delete();

        return redirect()->route('inicio');
    }

    public function tiempo($id) {
        $imagen = Image::findOrFail($id);
        $fechaImagen = date_create($imagen->created_at);
        $fechaActual = date_create(date('Y/m/d h:i:s'));
        $diferencia = $fechaActual->diff($fechaImagen);

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
