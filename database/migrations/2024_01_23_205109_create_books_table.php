<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_category_id')->unsigned();
            $table->string('title');
            $table->string('author');
            $table->string('description')->nullable();
            $table->string('publisher');
            $table->string('year');
            $table->string('isbn')->nullable();
            $table->string('pages')->nullable();
            $table->string('language')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('price');
            $table->string('quantity');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('book_category_id')->references('id')->on('book_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
