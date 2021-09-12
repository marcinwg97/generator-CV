<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cv', function (Blueprint $table) {
            $table->string('imie')->nullable();
            $table->string('kolor')->nullable();
            $table->string('szablon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cv', function (Blueprint $table) {
            $table->dropColumn('ime');
            $table->dropColumn('kolor');
            $table->dropColumn('szablon');
        });
    }
}
