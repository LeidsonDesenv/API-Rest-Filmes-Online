<?php



Route::get('/', function () {
    return view("index");
});

Route::group(['prefix' => 'categories'], function(){
    Route::get('/', "CategoryController@allCategories");
    Route::get('/{id}', "CategoryController@searchById");
    
    Route::group(['middleware' => 'auth'], function(){
        Route::post('/', "CategoryController@create");         
        Route::put('/{id}',"CategoryController@update" );
        Route::delete('/{id}', "CategoryController@destroy" );        
    });    
});

Route::group(['prefix' => 'directors'], function(){
    Route::get('/', 'DirectorController@allDirectors');
    Route::get('/{id}', 'DirectorController@searchById');
    Route::group(['middleware' => 'auth'], function(){
        Route::post('/','DirectorController@create' );
        Route::put('/{id}', 'DirectorController@update' );
        Route::delete('/{id}', 'DirectorController@destroy' );
    });
});
    


Route::group(['prefix' => 'movies'], function(){
    Route::get('/', 'MovieController@allMovies');
    Route::get('/{id}','MovieController@searchById');
    Route::get('/name/{name}','MovieController@searchByName');
    Route::get('director/{id}', 'MovieController@searchByDirector');
    Route::get('category/{id}', 'MovieController@searchByCategory');
    Route::group(['middleware' => 'auth'], function(){
        Route::post('/', 'MovieController@create');
        Route::put('/{id}', 'MovieController@update');
        Route::delete('/{id}', 'MovieController@destroy');
    });
    
});

Route::group(['prefix' => 'series'], function(){
    Route::get('/', 'SerieController@allSeries');
    Route::get('/{id}', 'SerieController@searchById');
    Route::get('name/{name}', 'SerieController@searchByName');
    Route::get('director/{id}', 'SerieController@searchByDirector');
    Route::get('category/{id}', 'SerieController@searchByCategory');
    Route::group(['middleware' => 'auth'], function(){
        Route::post('/', 'SerieController@create');
        Route::put('/{id}', 'SerieController@update');
        Route::delete('/{id}', 'SerieController@destroy');
    });
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'Teste\UseMovieController@index' );

Route::get('/movielist',  'Teste\UseMovieController@movies')->name('movielist');
Route::post('/index', 'Teste\UseMovieController@createMovie')->middleware('auth');
Route::put('/index/{id}',  'Teste\UseMovieController@update')->name('update')->middleware('auth');
Route::get('/updatemovie/{id}', 'Teste\UseMovieController@edit')->middleware('auth');
Route::get('/search/{id}', 'Teste\UseMovieController@searchById')->middleware('auth');
Route::get('/getmovie/{id}', 'Teste\UseMovieController@buscaFilme')->middleware('auth');
Route::delete('/getmovie/{id}', 'Teste\UseMovieController@delete')->middleware('auth');
   

