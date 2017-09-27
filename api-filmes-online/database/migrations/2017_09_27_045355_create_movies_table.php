<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('release_year', 4);
            $table->text('star_list');
            //fonte http://www.justica.gov.br/seus-direitos/classificacao
            //classificação indicativa brasileira
            $table->enum('classId', ['Livre' , '10' , '12', '14', '16' , '18']);
            
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('director_id')->unsigned();
            $table->foreign('director_id')->references('id')->on('directors');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
