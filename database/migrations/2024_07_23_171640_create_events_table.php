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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('headline')->nullable();
            $table->string('description')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->string('location')->nullable();
            $table->integer('duration')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->json('photos')->nullable();
            $table->string('type')->default('offline');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
