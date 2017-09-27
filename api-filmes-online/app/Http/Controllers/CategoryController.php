<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    protected $category;
    public function __construct() {
        $this->category = new Category;
       // $this->middleware('auth', ['except' => ['allCategories' , 'searchById'] ]);
    }
    public function allCategories(){
         $categories =  $this->category->all();        
        return response()->json($categories);
    }
    
    public function searchById($id){
        $category = $this->category->find($id);
        if(!$category){
            return response()->json(['message' => 'Item não encontrado'], 404);
        }
        return response()->json($category);
    }
    
    public function searchByName($name_chunk){
        return "Pesquisou por ". $name_chunk;
    }
    
    public function create(Request $request){
        $result = $this->category->create([
            'category' =>  $request->name,
            'description' =>  $request->description
        ]);
        if(!$result){
            return response()->json(['message' => 'Erro ao realizar operação, entre em contato com o ADM'],  404);
        }
        return response()->json($result, 201);
    }
    
    public function update(Request $request,$id){
        $result = $this->category->find($id);
        if(!$result){
            return response()->json(['message' => 'Erro ao realizar operação, entre em contato com o ADM'],  404);
        }
        $result->fill($request->all());
        $result->save();
        return response()->json($result);
    }
    
    public function destroy($id){
        $result = $this->category->find($id);
        if(!$result){
            return response()->json(['message' => 'Erro ao executar operação'], 404);
        }
        $result->delete();
        return response()->json(['message' => 'Operação realizada com sucesso'], 200);
    }
    
    
    
    
}

