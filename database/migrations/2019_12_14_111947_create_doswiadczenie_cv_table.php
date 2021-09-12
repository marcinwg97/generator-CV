<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoswiadczenieCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doswiadczenie_cv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('cv_id')->unsigned();
            $table->string('nazwa_stanowiska', 255);
            $table->string('miejsce', 255);
            $table->string('opis', 255);
            $table->string('rok_od');
            $table->string('rok_do');
            $table->boolean('biezaca');

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
        Schema::dropIfExists('doswiadczenie_cv');
    }
}
