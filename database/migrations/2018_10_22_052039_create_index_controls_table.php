<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Createindex_controlsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_controls', function (Blueprint $table) {
            $table->increments('id');
            $table->text('paragraph');
            $table->text('image1');
            $table->string('title2');
            $table->text('paragraph');
            $table->text('image2');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('index_controls');
    }
}
