<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('artist_id');
            $table->string('title');
            $table->string('description');
            $table->string('drummer')->nullable();
            $table->string('album'); // relation?
            $table->string('album_artwork_url')->nullable();
            $table->string('label'); // relation?
            $table->year('year');
            $table->string('sample_url');
            $table->string('artwork_url');
            $table->timestamps();
            $table->foreign('artist_id')
                ->references('id')
                ->on('artists');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
