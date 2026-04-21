@extends("layouts.plantilla")

@section("titulomain")
Categorias
@endsection

@section("contenido")
  {{-- realimentacion del usuario --}} 
  @if(session('error'))
  <div>
    {{ session('error') }}
  </div>
  @endif
<section class="container-tabla">
    <h2 class="titulo-tabla"> Categorias</h2>

    <nav class="nav-botones">
        <ul class="nav-menu">      
      
            <li class="nav-item">
                <a href="{{route('categoria.create')}}" class="nav-link btn-agregar">Agregar Categoria</a>
            </li>      
         
        </ul>
    </nav>
    
    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Status</th>               
                <th>Opciones</th>
            </tr>
        </thead>
       <tbody class="tabla-categorias">

    @foreach ($categorias as $categoria)
       <tr>
         <td>{{$categoria->id}}</td>
         <td>{{$categoria->nombre}}</td>
         <td>{{$categoria->descripcion}}</td>
         <td>{{$categoria->status}}</td>
         
            <td >
                <a href="{{route('categoria.show',$categoria)}}">
                   <img src="img/view.png" alt=""> 
                </a>

             
                      
                 
                   <a href="{{route('categoria.edit',$categoria)}}">
                   <img src="img/edit.png" alt="">
                   </a>
                             
                                        
               
                    <form action="{{route('categoria.destroy',$categoria)}}" method="POST" onsubmit="return confimarEliminacion()">

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
@endsection