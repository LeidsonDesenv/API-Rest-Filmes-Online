<?php



Route::get('/', function () {
    return view("index");
});

Route::group(['prefix' => 'categories'], function(){
    Route::get('/', "CategoryController@allCategories");
    Route::get('/{id}', "CategoryController@searchById");
    Route::post('/', "CategoryController@create");         
    Route::put('/{id}',"CategoryController@update" );
    Route::delete('/{id}', "CategoryController@destroy" );
});

Route::group(['prefix' => 'directors'], function(){
    Route::get('/', 'DirectorController@allDirectors');
    Route::get('/{id}', 'DirectorController@searchById');
    Route::post('/','DirectorController@create' );
    Route::put('/{id}', 'DirectorController@update' );
    Route::delete('/{id}', 'DirectorController@destroy' );
});
    


Route::group(['prefix' => 'movies'], function(){
    Route::get('/', 'MovieController@allMovies');
    Route::get('/{id}','MovieController@searchById');
    Route::get('/name/{name}','MovieController@searchByName');
    Route::post('/', 'MovieController@create');
    Route::put('/{id}', 'MovieController@update');
    Route::delete('/{id}', 'MovieController@destroy');
    
});

Route::group(['prefix' => 'series'], function(){
    Route::get('/', 'SerieController@allSeries');
    Route::get('/{id}', 'SerieController@searchById');
    Route::post('/', 'SerieController@create');
    Route::put('/{id}', 'SerieController@update');
    Route::delete('/{id}', 'SerieController@destroy');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
