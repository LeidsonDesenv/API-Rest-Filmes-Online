<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Director;

class DirectorController extends Controller
{
    protected $director;
    public function __construct() {
        $this->director = new Director;
    }

    public function allDirectors(){
         $directors =  $this->director->all();
         //comentando para teste
        return response()->json(["directors" => $directors], 200);
         //return $director;
    }

    public function searchById($id){
        $director = $this->director->find($id);
        if(!$director){
            return response()->json(['message' => 'Item não encontrado'], 404);
        }
        return response()->json($director);
    }

     public function create(Request $request){
        $this->validate($request, $this->director->rules) ;

        $result = $this->director->create([
            'name' =>  $request->name,
            'description' =>  $request->description
        ]);
        if(!$result){
            return response()->json(['message' => 'Erro ao realizar operação, entre em contato com o ADM'],  404);
        }
        return response()->json($result, 201);
    }

    public function update(Request $request,$id){
        $result = $this->director->find($id);
        if(!$result){
            return response()->json(['message' => 'Erro ao realizar operação, entre em contato com o ADM'],  404);
        }
        $result->fill($request->all());
        $result->save();
        return response()->json($result);
    }
     public function destroy($id){
        $result = $this->director->find($id);
        if(!$result){
            return response()->json(['message' => 'Erro ao executar operação'], 404);
        }
        $result->delete();
        return response()->json(['message' => 'Operação realizada com sucesso'], 200);
    }


}
