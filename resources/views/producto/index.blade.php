@extends("layouts.plantilla")

@section("titulomain")
Productos
@endsection

@section('contenido')
    
<section class="container-tabla">
   <h2 class="titulo-tabla"> Listado de productos</h2>
   
 <nav class="nav-botones">
               
        <ul class="nav-menu">
            
            <li class="nav-item">
                <a href="{{route('producto.create')}}" class="nav-link btn-agregar">Agregar Producto</a>
            </li>
            

        </ul>
    </nav>
  
   <table >
    
       <thead>
           <tr>
               <th>ID</th>
               <th>Nombre</th>
               <th>Imagen</th>
               <th>Categoría</th>
               <th>Precio</th>
               <th>Precio de venta</th>
               <th>Stock</th>
               <th>Opciones</th>
           </tr>
       </thead>
       <tbody class ="tabla-productos">
         @foreach ($productos as $producto)
         <tr>                
             <td>{{$producto->id}}</td>
             <td>{{$producto->nombre}}</td>
             <td >
               <img src="{{asset('img/'.$producto->imagen)}}"  alt="{{$producto->imagen}}">

             </td>
             <td> 
               @if ($producto->categoria)
               {{ $producto->categoria->nombre }}
               @else
               Sin categoría
               @endif
             </td>
             <td>{{$producto->precio}}</td>
             <td>{{$producto->precio_venta}}</td>
             <td>{{$producto->stock}}</td>
             <td >
              <a href="{{route('producto.show',$producto)}}">
                 <img src="img/view.png" alt="">
              </a>
              <a href="{{route('producto.edit',$producto)}}">
                 <img src="img/edit.png" alt="">
              </a>
             
              <form action="{{route('producto.destroy',$producto)}}" method="POST" onsubmit="return confimarEliminacion()">

                 {{-- permite gemrar el token para enviar por post --}}
                 @csrf
                 {{-- agregar metodo delete --}}
                 @method('DELETE')
                 <input type="image"src="img/delete.png"></input>

              </form>
              <script>
                 function confimarEliminacion() {
                     return confirm('¿Seguro deseas eliminar?'); // Muestra el mensaje de confirmación
                 }
             </script>
             </td>                                
         </tr>
         @endforeach  
          
       </tbody>
   </table>
    
    </div>
</section>
@endsection