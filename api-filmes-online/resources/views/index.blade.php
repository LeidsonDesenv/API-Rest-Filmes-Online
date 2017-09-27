<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,inicial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home de Teste</title>
  </head>
  <body>
      <h1>Página Principal</h1>
      <form action="category/add" method="post">
          {{csrf_field()}}
          <input type="text" name="category"/>
          
        @if(isset($categories) )
        <select>
            @foreach($categories as $category)      
            <option value="{{$category->id}}"> {{$category->category}} </option>
            @endforeach
        </select>
        @endif
          
          <input type="submit" name="" />
              
      </form>
      
      
     
  </body>
</html>
