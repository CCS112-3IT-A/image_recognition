<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->integer('score')->default(0); // Add the score column, defaulting to 0
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('score');
    });
}

};