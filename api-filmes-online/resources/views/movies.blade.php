@extends('layouts.app')

@section('content')
    @if( isset($result))
    <div class="row">
       @foreach($result as $movie)
       <div  class="col-md-8 col-md-offset-2">
            <div class="clearfix" style="background-color: white; padding: 5px;margin: 10px; border: 1px solid gray">

                <strong> {{ $movie->name }}</strong> <br/>
               Ano: {{ $movie->release_year }}<br/>
               Classificação Indicativa: {{ $movie->classId }}<br/>
                Categoria: {{ $movie->category }}<br/>
                Diretor: {{ $movie->director }}<br/>
                <a href="/updatemovie/{{ $movie->id }}" class="btn btn-warning pull-right">Editar</a>
                <a href="search/{{ $movie->id }}" class="btn btn-danger pull-right" >Excluir</a>

            </div>
       </div>
       @endforeach
    @endif
    </div>
@endsection

