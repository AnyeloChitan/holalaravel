<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias=Categoria::orderBy("id","DESC")->paginate(8);
        return view("categoria.index",compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("categoria.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        //validar la informacion del formulario
        $datosValidos=$request->validated();

        $categoria=Categoria::create($datosValidos);

        return redirect()->route("categoria.index")->with('success','Categoria agragada correctamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Categoria $categoria)
    {
        //
       // $categoria=Categoria::findOrFail($id);
        return view("categoria.edit",["categoria"=>$categoria]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        //
        $categoria->update($request->validated());
        return redirect()->route("categoria.index")->with('success','Categoria actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
        try{
           $categoria->delete();
            return redirect()->route("categoria.index")->with('success','Categoria eliminada correctamente');
        
        }catch(QueryException $e){
            if($e->getCode()==="23000"){
                return redirect()->back()->with('error','No se puede eliminar una categoria que tiene productos asociados');
            }
             return redirect()->back()->with('error','Error inesperado');
        }

        
    }
}
