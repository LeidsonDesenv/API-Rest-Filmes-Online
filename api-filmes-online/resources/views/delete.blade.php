@extends('layouts.app')

@section('content')
    @if( isset($movie))
    <div  class="col-md-8 col-md-offset-2">
        <div class="clearfix" style="background-color: white; padding: 5px;margin: 10px; border: 1px solid gray">
        <strong> {{ $movie[0]->name }}</strong> <br/>
               Ano: {{ $movie[0]->release_year }}<br/>
               Classificação Indicativa: {{ $movie[0]->classId }}<br/>
                Categoria: {{ $movie[0]->category }}<br/>
                Diretor: {{ $movie[0]->director }}<br/>
                <form action="/getmovie/{{ $movie[0]->id }}" method="post">
                    {!! method_field("delete") !!}
                    <input type='submit' value="Deletar" class="btn btn-danger" >
                        
                </form>
        </div>
    </div>   
    @endif
@endsection

