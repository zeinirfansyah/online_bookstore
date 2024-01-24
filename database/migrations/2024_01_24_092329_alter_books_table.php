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
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['book_category_id']);
            
            $table->foreign('book_category_id')->references('id')->on('book_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['book_category_id']);

            // Recreate the foreign key without ON DELETE CASCADE
            $table->foreign('book_category_id')
                ->references('id')
                ->on('book_categories');
        });
    }
};
