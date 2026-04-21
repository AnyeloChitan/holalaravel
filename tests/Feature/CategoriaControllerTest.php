<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categoria;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;

class CategoriaControllerTest extends TestCase
{
    /**
     * Este test prueba todasd la funcionalidades de el controlador CategoriaController
     * 
     */
    Use RefreshDatabase;
    
    protected function setUp():void{
        parent::setUp();

        //ejecutar los seeders para crear rles permisos y ususarios en la DB de memoria
        $this->seed(\Database\Seeders\DatabaseSeeder::class);

        //elegir el usuario admin
        $admin=User::where('email','admin@gmail.com')->first();
        //autenticar al usuario
        $this->actingAs($admin);
    }
   
    #[Test]
    public function puede_listar_categorias(){
        Categoria::factory()->count(5)->create();
        $response=$this->get(route('categoria.index'));
        $response->assertStatus(200);
        $response->assertViewHas('categorias');
    }

    #[Test]
    public function puede_crear_una_categoria(){
        $data=[
            'nombre'=>'Bebidas',
            'descripcion'=>'Descripcion de prueba',
            'status'=>true

        ];
        $response=$this->post(route('categoria.store'),$data);
        $response->assertRedirect(route('categoria.index'));
        $this->assertDatabaseHas('categorias',['nombre'=>'Bebidas']);
    }
    #[Test]
    public function puede_actualizar_una_categoria(){
        $categoria=Categoria::factory()->create();
        $data=[
            'nombre'=>'Categoria Actualizada',
            'descripcion'=>'Descripcion de prueba',
            'status'=>true

        ];
        $response=$this->put(route('categoria.update',$categoria->id),$data);
        $response->assertRedirect(route('categoria.index'));
        $this->assertDatabaseHas('categorias',['nombre'=>'Categoria Actualizada']);

    }
    #[Test]
    public function puede_eliminar_una_categoria(){
        $categoria=Categoria::factory()->create();
        $response=$this->delete(route('categoria.destroy',$categoria));
        $response->assertRedirect(route('categoria.index'));
        $this->assertDatabaseMissing('categorias',['id'=>$categoria->id]);

    }

}
