<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class CatalogoProductos extends Component
{
     public $search='';
     public $productos=[];
    public function render()
    {
        if(empty($this->search)){
            $this->productos=Producto::where('stock','>',0)->get();

        }else{
            $this->productos=Producto::where('stock','>',0)
             ->where('nombre','like','%'.$this->search.'%')
             ->get();
        }

  
 
        return view('livewire.catalogo-productos');
    }
}
