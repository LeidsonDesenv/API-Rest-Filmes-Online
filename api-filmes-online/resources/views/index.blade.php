@extends('layouts.app')

@section('content')

<div class="row" style="background-color: white">
        <div class="col-md-8 col-md-offset-2">
            <a href="/movielist" class="btn btn-success">Lista de Filmes</a>            
            @if( isset($alt))
            <a href="/index" class="btn btn-primary">Cadastrar Novo</a>            
            @endif
        </div>   
<div class="col-md-8 col-md-offset-2">
        
@if( isset($alt))
<form action="{{ route('update',  $atualizar[0]->id )  }}" method="post" >
    {!! method_field("put") !!}
    <h3>Atualizar  Filme</h3>
    Id:
    <input type="number" name="id"  class="form-control" value="{{ $atualizar[0]->id or '' }}"/>
    

@else

<form action="/index" method="post" >
    <h3>Cadastrar Novo Filme</h3>
    
@endif

    Nome:
    <input type="text" name="name"  class="form-control" 
              value=" {{  $atualizar[0]->name  or '' }} " />
    <br/>
    Ano:  <input type="text" name="year" class="form-control"
             value=" {{  $atualizar[0]->release_year or '' }}"  />
    <br/>
    Classificação Indicativa:
    <input type="text" name="classId" class="form-control"
           value=" {{  $atualizar[0]->classId or '' }}"       />
    <br/>
    
    Lista de  Estrelas:  <textarea name="star_list" class="form-control">
         {{  $atualizar[0]->star_list or '' }} 
    </textarea><br/>
    Categoria: 
     @if( isset($categories) )
    <select name="category_id" class="form-control">
        @foreach($categories as $category)
        <option value=" {{ $category->id }} " > {{ $category->category or '' }}</option>
        @endforeach
    </select>
    @endif
    Diretor: 
    @if( isset($directors) )
    <select name="director_id" class="form-control">
        @foreach($directors as $director)
        <option value=" {{ $director->id }} " > {{ $director->name or '' }}</option>
        @endforeach
    </select>
    @endif
    
    @if( isset($alt))
    <input  type="submit" value="Atualizar" class="btn btn-warning"/>
    @else
    <input  type="submit" value="cadastrar" class="btn btn-primary"/>
    @endif

    @if(isset($error))
    <div class="alert alert-danger">   {{$error}} </div>
    @endif
 
</form>
</div>
 </div>


@endsection
