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
        Schema::create('supply_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('supply_id')->unsigned();
            $table->bigInteger('book_id')->unsigned();
            $table->integer('price');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('supply_id')->references('id')->on('supplies')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_details');
    }
};
