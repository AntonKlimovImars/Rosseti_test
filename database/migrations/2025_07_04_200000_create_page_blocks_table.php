<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->json('settings')->nullable();
            $table->timestamps();
        });

        Schema::create('block_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_block_id')->constrained()->cascadeOnDelete();
            $table->string('key');
            $table->longText('value')->nullable();
            $table->string('type')->default('text'); // text, textarea, number, image, rich_text, json
            $table->string('label')->nullable(); // Human-readable label for admin
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->unique(['page_block_id', 'key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('block_fields');
        Schema::dropIfExists('page_blocks');
    }
};
