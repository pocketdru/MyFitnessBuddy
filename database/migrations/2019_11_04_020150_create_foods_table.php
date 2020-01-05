<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string("foodName");
            $table->integer("protein");
            $table->integer("carbs");
            $table->integer("fat");
            $table->integer("cholesterol");
            $table->integer("sodium");
            $table->integer("fiber");
            $table->integer("sugars");
            $table->integer('meal_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('foods', function($table) {
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');;
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('foods');
    }
}
