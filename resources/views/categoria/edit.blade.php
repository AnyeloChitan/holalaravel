@extends('layouts.plantilla')

@section('titulomain')
<a href="{{ route('categoria.index') }}">Categorías</a> / 
<span>Editar {{ $categoria->nombre }}</span>
@endsection
@section('contenido')

<div class= "container-formulario">
    <div class="card formulario">
        <h2>Crear Nueva Categoría</h2>
        <form action="{{route('categoria.update',$categoria->id)}}" method="POST">
            {{-- agregar directica para qu se genere un token --}}
            @csrf
    
            {{-- agregar metodo patch --}}
            @method('PATCH')
            <!-- Campo Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre de la Categoría</label>
                <input type="text" id="nombre" name="nombre" required value={{$categoria->nombre}} class="form-control @error('nombre') is-invalid @enderror"
        value="{{ old('nombre') }}">
            </div>
            <!-- Campo Descripción -->
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"
               >{{$categoria->descripcion}}</textarea>
            </div>
            <!-- Campo Status -->
            <div class="form-group">
                <label for="status">Estado</label>
                <select id="status" name="status" required >
                    <option value="1" {{ $categoria->status == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ $categoria->status == 0 ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <!-- Botón Guardar -->
            <div class="form-group">
                <button type="submit">Actualizar Categoría</button>
            </div>
        </form>

         @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    </div>
    </div>

@endsection