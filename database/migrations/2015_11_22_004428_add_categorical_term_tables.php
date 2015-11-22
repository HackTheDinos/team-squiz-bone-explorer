<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoricalTermTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('museums', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
        });

        Schema::create('authors', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
        });

        Schema::create('animal_groups', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
        });

        Schema::create('media_types', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('museums');
        Schema::drop('authors');
        Schema::drop('animal_groups');
        Schema::drop('media_types');
    }
}
