<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('author')->nullable();
            $table->string('file');
            $table->string('description')->nullable();
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('posted_by_id')->nullable();
            $table->integer('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
