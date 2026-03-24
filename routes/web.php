<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/categoria',CategoriaController::class )->parameters(["categoria"=>"categoria"]);

Route::get('/hola', function () {
    return "hola";
});


Route::get('/hola/{nombre}/{apellido}', function ($nombre,$apellido=null) {
    return "hola $nombre $apellido";
});