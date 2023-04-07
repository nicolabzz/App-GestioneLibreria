<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('user_id');

            $table->id();
            $table->string('title');
            $table->string('author');
            $table->unsignedBigInteger('isbn')->nullable();
            $table->text('summary')->nullable();
            $table->dateTime('added_date');
            $table->dateTime('deleted_date')->nullable();
            $table->integer('read_count')->default(0);


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}
