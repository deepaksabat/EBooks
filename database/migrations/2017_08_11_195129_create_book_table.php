<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
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
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->string('pdf');
            $table->string('publisher');
            $table->string('category_id');
            $table->string('author');
            $table->string('edition');
            $table->string('isbn');
            $table->string('pages');
            $table->string('published');
            $table->string('posted');
            $table->string('language');
            $table->string('book_format');
            $table->string('book_size');
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
        //
    }
}
