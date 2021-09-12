<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nazwisko')->nullable();
            $table->date('data_ur')->nullable();
            $table->string('telefon')->nullable();
            $table->string('miasto')->nullable();
            $table->string('kod_pocztowy')->nullable();
            $table->string('zdjecie')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nazwisko');
            $table->dropColumn('data_ur');
            $table->dropColumn('telefon');
            $table->dropColumn('miasto');
            $table->dropColumn('kod_pocztowy');
            $table->dropColumn('zdjecie');
        });
    }
}
