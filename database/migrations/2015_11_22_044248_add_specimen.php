<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpecimen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specimens', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('specimenNumber');
            $table->string('speciesCommonName');
            $table->string('speciesScientificName');
        });

        Schema::create('scans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('scanId');
            $table->string('scanQuality');
            $table->string('fileDirectory');
            $table->string('location');
            $table->string('scanTime');
            $table->double('voltage');
            $table->string('voxelSize');
            $table->integer('imageCount');
            $table->string('current');
            $table->string('sequence');
            $table->integer('specimenId')->unsigned();
            $table->foreign('specimenId')->references('id')->on('specimens');
            $table->integer('museumId')->unsigned();
            $table->foreign('museumId')->references('id')->on('museums');
            $table->integer('authorId')->unsigned();
            $table->foreign('authorId')->references('id')->on('authors');
            $table->integer('animalGroupId')->unsigned();
            $table->foreign('animalGroupId')->references('id')->on('animal_groups');
        });

        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('filePath');
            $table->string('fileName');
            $table->string('fileUrl');
            $table->integer('scanId')->unsigned();
            $table->foreign('scanId')->references('id')->on('scans');
        });

        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('filePath');
            $table->string('fileName');
            $table->string('fileUrl');
            $table->integer('scanId')->unsigned();
            $table->foreign('scanId')->references('id')->on('scans');
            $table->integer('mediaTypeId')->unsigned();
            $table->foreign('mediaTypeId')->references('id')->on('media_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('specimens');
        Schema::drop('images');
        Schema::drop('scans');
        Schema::drop('media');
    }
}
