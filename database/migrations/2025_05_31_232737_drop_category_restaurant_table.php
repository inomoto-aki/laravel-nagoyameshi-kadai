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
        Schema::dropIfExists('category_restaurant');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('category_restaurant', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
};
