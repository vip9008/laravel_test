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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('day_id')->constrained('days')->onDelete('cascade');
            $table->tinyInteger('type');
            $table->string('title');
            $table->text('recipe');
            $table->string('image');
            $table->integer('calories');
            $table->float('fat');
            $table->float('protein');
            $table->float('net_carbs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
