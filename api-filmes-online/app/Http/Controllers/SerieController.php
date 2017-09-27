<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Serie;

class SerieController extends Controller
{
    protected $serie;
    
    public function __construct() {
        $this->serie = new Serie;
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
    
    public function create(Request $request){
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
