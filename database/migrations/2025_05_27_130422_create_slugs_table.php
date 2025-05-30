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
        Schema::create('slugs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->boolean('is_current')->default(true);
            $table->foreignId('portfolio_id')->constrained('portfolios')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slugs');
    }
};
