<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Movie;

class MovieController extends Controller
{
    protected $movie;
    public function __construct() {
        $this->movie = new Movie;
    }
    public function allMovies(){               
       $movies = DB::table('movies')
               ->join('categories', 'movies.category_id', '=' ,'categories.id')
               ->join('directors', 'movies.director_id', '=' , 'directors.id')
               ->select('movies.*', 'directors.name as director', 'categories.category')
               ->get();
        return response()->json($movies);
    }
    
    public function searchById($id){
         $movies = DB::table('movies')
               ->where('movies.id', $id)
               ->join('categories', 'movies.category_id', '=' ,'categories.id')
               ->join('directors', 'movies.director_id', '=' , 'directors.id')
               ->select('movies.*', 'directors.name as director', 'categories.category')               
               ->get();
         
         if(!$movies){
             return response()->json(['message' => 'Filme não encontrado'], 404);
         }
         return response()->json($movies);
    }
    
    public function searchByName($name){
         $movies = DB::table('movies')
               ->where('movies.name', 'like', '%'.$name.'%')
               ->join('categories', 'movies.category_id', '=' ,'categories.id')
               ->join('directors', 'movies.director_id', '=' , 'directors.id')
               ->select('movies.*', 'directors.name as director', 'categories.category')               
               ->get();
         
         if(!$movies){
            return response()->json([ 'message' => 'Item não encontrado'], 404);
        }
         return response()->json($movies);
    }
    
    public function create(Request $request){
       $result = $this->movie->create(['name' => $request->name ,
                            'release_year' => $request->year ,
                            'star_list' => $request->star_list ,
                            'classId' => $request->classId,
                            'category_id' => $request->category_id,
                            'director_id' => $request->director_id]);
        return response()->json($result ,201);
    }
    
    public function update(Request $request, $id){
        $movie = $this->movie->find($id);     
        if(!$movie){
            return response()->json([ 'message' => 'Item não encontrado'], 404);
        }
        $movie->fill($request->all());        
        $movie->save();
        return response()->json($movie);
    }
    public function destroy($id){
        $result = $this->movie->find($id);
        if(!$result){
            return response()->json(['message' => 'Erro ao executar operação'], 404);
        }
        $result->delete();
        return response()->json(['message' => 'Operação realizada com sucesso'], 200);
    }
    
    
    
    
}
