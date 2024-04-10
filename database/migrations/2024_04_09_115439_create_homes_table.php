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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('section_one_title')->nullable();
            $table->string('section_two_title')->nullable();
            $table->string('section_two_title_two')->nullable();
            $table->string('section_three_title')->nullable();
            $table->text('section_three_description')->nullable();
            $table->text('section_three_image')->nullable();
            $table->string('section_four_subtitle')->nullable();
            $table->string('section_four_title')->nullable();
            $table->string('section_five_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
