<?php

namespace App\Http\Controllers\Teste;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DirectorController;


class UseMovieController extends Controller
{
    //protected $movies;
    protected $movie_elo;
    public function __construct() {
        $this->movies = new MovieController;
        $this->directors = new DirectorController;
        $this->categories = new CategoryController;
    }
    
    public function index(){
        $categories = $this->categories->allCategories();
        $directors = $this->directors->allDirectors();
        return view('index', compact('categories', 'directors'));
    }
    
    public function movies(){
        //SENHORA gambiarra
        $result =  $this->movies->allMovies();         
        
        return view('movies', compact('result'));
    }
    
    public function edit($id){
        $alt = "Pronto";
        $categories = $this->categories->allCategories();
        $directors = $this->directors->allDirectors();
        $atualizar =  $this->movies->searchById($id);        
        //dd($atualizar);
        return view('index', compact('alt', 'categories', 'directors', 'atualizar'));
    }
    
     public function createMovie(Request $request){
        //dd($request);
        $result = $this->movies->create($request);
        if(!$result){
            return "Não deu certo";
        }
        return "Deu certo";
    }
    
    public function update(Request $request, $id){
        //dd($request);
        $atualizar =  $this->movies->update($request, $id);
        if(!$atualizar){
            $error = "Erro no processo de atualização";
            return view('index', compact('error'));
        }
         return redirect()->route("movielist");
    }
    
    public function searchById($id){
        $movie = $this->movies->searchById($id);
        return view('delete', compact('movie'));
    }
    
    public function delete($id){
        $movie = $this->movies->destroy($id);
        if(!$movie){
            return "Erro ao efetuar operação";
        }
            return "Sucesso ao efetuar operação";
    }
   
    
    
    
    
}
