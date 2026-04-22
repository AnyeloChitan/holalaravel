<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class WelcomeController extends Controller
{
    //
   public function welcome(){
    $productos=Producto::select('nombre','imagen','descripcion','precio_venta','stock','id_categoria')
    ->orderBy('id','ASC')
    ->paginate(10);
    return view('welcome',compact('productos'));

   }

}
