<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{

    public function allCategories(){
         $categories =  Category::all();
         //Usando Query Builder
         //$categories = DB::table('categories')->get();
         //se fosse preciso apenas a coluna category para mostrar só os nomes das categorias
         //$categories = DB::table('categories')->pluck('category');
         //comentando para teste
         return response()->json(["categories" => $categories], 200);
         //return $categories;
    }

    public function searchById($id){
        $category = Category::find($id);
        //Usando Query Builder
       //o Método first da Query Builder retorna o primeiro valor encontrado
       // $category = DB::table('categories')->where('id', $id)->first();
        if(!$category){
            return response()->json(['message' => 'Item não encontrado'], 404);
        }
        return response()->json($category);
    }


    public function create(Request $request){
        $category = new Category();
        $this->validate($request, $category->rules);
        $result = $category->create([
            'category' =>  $request->name,
            'description' =>  $request->description
        ]);
        if(!$result){
            return response()->json(['message' => 'Erro ao realizar operação, entre em contato com o ADM'],  404);
        }
        return response()->json($result, 201);
    }

    public function update(Request $request,$id){
        $result = Category::find($id);
        if(!$result){
            return response()->json(['message' => 'Erro ao realizar operação, entre em contato com o ADM'],  404);
        }
        $result->fill($request->all());
        $result->save();
        return response()->json($result);
    }

    public function destroy($id){
        $result = Category::find($id);
        if(!$result){
            return response()->json(['message' => 'Erro ao executar operação'], 404);
        }
        $result->delete();
        return response()->json(['message' => 'Operação realizada com sucesso'], 200);
    }




}
