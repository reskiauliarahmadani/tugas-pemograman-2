<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('ingredients');
            $table->text('instructions');
            $table->integer('duration');
            $table->enum('difficulty', ['Mudah', 'Sedang', 'Sulit']);
            $table->integer('servings');
            $table->enum('category', ['Makanan Berat', 'Camilan', 'Minuman', 'Dessert']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
