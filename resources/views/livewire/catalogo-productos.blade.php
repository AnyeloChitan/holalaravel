<div>
    <input type="text" wire:model.lazy="search" placeholder="Buscar producto..." class="search">
    <div class="productos-grid">
          @foreach ( $productos as $producto)
        <div class="producto">
            <img src="{{ asset('img/'.$producto->imagen) }}" alt="">
             <h3>{{$producto->nombre}}</h3>
             <p>Precio: $ {{$producto->precio_venta}}</p>
        </div>
              
          @endforeach
          @if($productos->isEmpty())

            <p> No se encontraron productos</p>
           @endif 
    </div>
</div>
