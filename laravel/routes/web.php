
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('home');
});
 */

Route::get('/get/{path}', 'StorageController@get')->middleware('auth')->name('fileGet')->where('path', '.*');



Route::middleware(['auth'])->group( function () {
    Route::get('/user/{id}', 'UserController@usuario')->name('user');
    Route::get('/userperfil/{id}', 'ImageController@imagenesUsuario')->name('userperfil');
    Route::get('/userconfiguracion/{id}', 'UserController@edit')->name('userconfiguracion');
    Route::post('/userconfiguracion/{id}', 'UserController@update')->name('useractualizar');
    Route::get('/tiempoUsuario/{id}', 'UserController@tiempo')->name('tiempoUsuario');

});

Route::middleware(['auth'])->group( function () {
    Route::get('/imagen/{id}', 'ImageController@show')->name('imagen');
    Route::get('/altaImagen', 'ImageController@create')->name('createImage');
    Route::post('/altaImagen', 'ImageController@store')->name('storeImage');
    Route::get('/inicio', "ImageController@index")->name('inicio');
    Route::get('/borraimagen/{id}', 'ImageController@destroy')->name('borraimagen');
    Route::get('/tiempoPublicacion/{id}', 'ImageController@tiempo')->name('tiempoPublicacion');
    Route::get('/editimage/{id}', 'ImageController@edit')->name('editimage');
    Route::post('/editimage/{id}', 'ImageController@update')->name('actualizarimage');
    Route::get('imagesLike/{id}', 'LikeController@index')->name('imagesLike');
    Route::get('/imagen/like/{id}', 'LikeController@create')->name('createLike');
    Route::get('/imagen/quitarLike/{id}', 'LikeController@destroy')->name('deleteLike');
});


Route::middleware(['auth'])->group( function () {
    Route::post('/imagen/{id}', 'CommentController@store')->name('storeComment');
    Route::get('/deleteComment/{id}', 'CommentController@destroy')->name('deleteComment');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
