@extends("layouts.plantilla")

@section("titulomain")
Productos
@endsection

@section('contenido')
    
<section class="container-tabla">
   <h2 class="titulo-tabla"> Listado de productos</h2>
   
 <nav class="nav-botones">
    {{-- formulario para filtros y busqueda --}}
    <form action="{{ route('producto.index') }}" method="GET" class="form-filtros">
        {{-- filtro por categoria --}}
        <select name="categoria" class="filtro-select">
            <option value="">Categoria</option>
            @foreach ( $categorias as $categoria)
                <option value="{{ $categoria->id }}"{{ request('categoria')== $categoria->id? 'selected':''}}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
        {{-- filtro por stock --}}
        <select name="stock" class= "filtro-select">
            <option value="">Stock</option>
            <option value="con"{{ request('stock')=='con'?'selected':'' }}>Con stock</option>
            <option value="sin"{{ request('stock')=='sin'?'selected':'' }}>Sin stock</option>

        </select>
        {{-- filtro por nombre del producto --}}
        <input type="text" name='buscar' placeholder="Buscar producto..." value="{{ request ('buscar') }}"
         class="filtro-input">
         <button type="submit" class="nav-link btn-filtrar">Filtrar</button>
         {{-- boton para borar busqueda --}}
        <a href="{{ route('producto.index') }}" class="nav-link btn-filtrar">Limpiar</a>
          
    </form>
               
        <ul class="nav-menu">
            @can('producto.create')
            <li class="nav-item">
                <a href="{{route('producto.create')}}" class="nav-link btn-agregar">Agregar Producto</a>
            </li>
            @endcan
             <li class="nav-item">
                <a href="{{route('pdf.productos')}}" class="nav-link btn-agregar">Generar PDF</a>
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
    {{-- resultados de paginacion --}}
    <div class="nav-botones">
       {{ $productos->links('vendor.pagination.default') }}
    </div>
    </div>
</section>
@endsection