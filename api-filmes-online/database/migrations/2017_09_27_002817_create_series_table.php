<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('release_year', 4);
            //fonte http://www.justica.gov.br/seus-direitos/classificacao
            //classificação indicativa brasileira
            $table->enum('classId', ['Livre' , '10' , '12', '14', '16' , '18']);
            $table->integer("season");
            
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
        Schema::dropIfExists('series');
    }
}
