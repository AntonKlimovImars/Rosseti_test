<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('report_pages', function (Blueprint $table) {
            $table->id();
            $table->string('number', 10);          // "01", "02", etc.
            $table->string('title');                 // "О Компании"
            $table->string('slug')->unique();        // "about-company"
            $table->string('hero_image')->nullable(); // path to hero banner image
            $table->string('color', 20)->default('#005B9C'); // section accent color
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });

        Schema::create('report_subsections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_page_id')->constrained()->cascadeOnDelete();
            $table->string('title');                 // "Портрет Группы компаний «Россети»"
            $table->string('slug')->nullable();      // for anchor links
            $table->json('content_blocks')->nullable(); // Filament Builder JSON
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_subsections');
        Schema::dropIfExists('report_pages');
    }
};
