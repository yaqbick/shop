<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('title');
            $table->integer('publisher_id')->unsigned();
            $table->year('publication_year');
            $table->string('cover')->nullable();
            $table->string('price');
            $table->text('description');
            $table->string('translation')->nullable();
            $table->integer('pages_number')->nullable();
            $table->string('format')->nullable();
            $table->string('binding')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('comment_id')->unsigned();
            $table->timestamps();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
