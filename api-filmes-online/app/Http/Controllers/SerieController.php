<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Serie;
use App\Director;
use App\Category;

class SerieController extends Controller
{
    protected $serie;
    protected $director;
    protected $category;
    
    public function __construct() {
        $this->serie = new Serie;
        $this->director = new Director;
        $this->category = new Category;
        
    }
    public function allSeries(){
        $series = DB::table('series')
               ->join('categories', 'series.category_id', '=' ,'categories.id')
               ->join('directors', 'series.director_id', '=' , 'directors.id')
               ->select('series.*', 'directors.name as director', 'categories.category')
               ->get();
        return response()->json($series);
    }
    
    public function searchById($id){
        $series = DB::table('series')
                ->where('series.id', $id)
               ->join('categories', 'series.category_id', '=' ,'categories.id')
               ->join('directors', 'series.director_id', '=' , 'directors.id')
               ->select('series.*', 'directors.name as director', 'categories.category')
               ->get();
        return response()->json($series);
    }
    
    public function searchByName($name){
         $result = DB::table('series')
               ->where('series.name', 'like', '%'.$name.'%')
               ->join('categories', 'series.category_id', '=' ,'categories.id')
               ->join('directors', 'series.director_id', '=' , 'directors.id')
               ->select('series.*', 'directors.name as director', 'categories.category')               
               ->get();
         
         if(!$result){
            return response()->json([ 'message' => 'Item não encontrado'], 404);
        }
         return response()->json($result);
    }
    
    public function searchByDirector($id){ 
        //o Eloquent acha o diretor pelo $id 
        // depois é possível acessa o método series(){ Director::hasMany('App\Serie'); }        
        //$series =  $this->director->find($id)->series;    
        
        //Na classe Query Builder
        $series = DB::table('series')
                 ->where('director_id' , $id)
                ->join('categories' , 'categories.id', '=' , 'series.category_id')
                 ->join('directors', 'directors.id', '=', 'series.director_id')
                 ->select('series.*', 'categories.category', 'directors.name as director')
                 ->get();
         
        if(!$series){
            return response()->json(['message' => 'Itens não encontrados'], 404);
        }
        return response()->json($series);
    }
    
    public  function searchByCategory($id){
        //$series = $this->category->find($id)->series;
        
        //Na classe Query Builder
        $series = DB::table('series')
                ->where('category_id', $id)
                ->join('categories' , 'categories.id', '=' , 'series.category_id')
                ->join('directors' , 'directors.id', '=' , 'series.director_id')
                ->select('series.*', 'categories.category', 'directors.name as director')
                ->get();
        
        if(!$series){
            return response()->json(['message' => 'Itens não encontrados'], 404);
        }
        return response()->json($series);
    }
    
    public function create(Request $request){
        $this->validate($request, $this->serie->rules);
        
        $result = $this->serie->create(['name' => $request->name ,
                            'release_year' => $request->year ,                            
                            'classId' => $request->classId,
                            'season' => $request->season,
                            'category_id' => $request->category_id,
                            'director_id' => $request->director_id ]);
        return response()->json($result ,201);
    }
    
    public function update(Request $request, $id){
        $result = $this->serie->find($id);     
        if(!$result){
            return response()->json([ 'message' => 'Item não encontrado'], 404);
        }
        $result->fill($request->all());        
        $result->save();
        return response()->json($result);
    }
    
     public function destroy($id){
        $result = $this->serie->find($id);
        if(!$result){
            return response()->json(['message' => 'Erro ao executar operação'], 404);
        }
        $result->delete();
        return response()->json(['message' => 'Operação realizada com sucesso'], 200);
    }
    
}
