<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Image;



class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $likes = Like::where('user_id', '=', $id)->paginate(5);
        return view('likes', array("likes"=>$likes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->image_id = $id;
        $like->save();

        $imagen = Image::findOrFail($id);

        return response()->json(
            array('like' => true,
                'numero' => $imagen->like()->count())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $like = Like::select('*')
                ->where('image_id', '=', $id)
                ->where('user_id', '=', Auth::user()->id);
        $like->delete();

        $imagen = Image::findOrFail($id);


        return response()->json(
            array('like' => true,
                'numero' => $imagen->like()->count())
        );
    }
}
