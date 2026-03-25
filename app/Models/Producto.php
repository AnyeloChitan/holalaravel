<?php

namespace App\Models;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //campos para asignacion masiva
  protected $fillable=[
    "nombre","descripcion","imagen","precio","precio_venta","stock","id_categoria"
  ];

  //relacion con categorias
  public function categoria(){
   
  return $this->belongsTo(Categoria::class,"id_categoria");

  }

}
