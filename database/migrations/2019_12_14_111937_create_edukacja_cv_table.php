<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdukacjaCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edukacja_cv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('cv_id')->unsigned();
            $table->string('szkola', 255);
            $table->string('kierunek', 255);
            $table->string('poziom_wyksztalcenia', 255);
            $table->string('rok_od');
            $table->string('rok_do');
            $table->boolean('uczy_sie');

            $table->foreign('cv_id')->references('id')->on('cv')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edukacja_cv');
    }
}
