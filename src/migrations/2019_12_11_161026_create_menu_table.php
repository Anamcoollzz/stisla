<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('nama');
            $table->string('route')->nullable();
            $table->string('ikon')->nullable();
            $table->tinyInteger('parent_id')->nullable()->unsigned();
            $table->foreign('parent_id')->references('id')->on('menu')->onUpdate('cascade')->onDelete('cascade');
            $table->string('is_blank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
