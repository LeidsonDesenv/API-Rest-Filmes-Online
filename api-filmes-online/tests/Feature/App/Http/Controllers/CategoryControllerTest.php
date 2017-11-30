<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Category;

use App\Http\Controllers\CategoryController;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearchById()
    {
        $category = new Category();
        $data = [
            'category' => 'Teste Category',
            'description' => 'Teste Description',
        ];
       $result = $category->create($data);       
       $response = $this->get('/categories/{id}', ['id' => $result->id]  );
       
       $response->assertStatus(200);
    }
    
    public function testAllCategories()
    {        
        $response = $this->get('/categories');
        $response->assertStatus(200);                  
    }  
          
}
