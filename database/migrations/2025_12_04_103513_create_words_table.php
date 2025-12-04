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
        Schema::create('words', function (Blueprint $table) {
            $table->increments('id');
            $table->string('word_hiragana')->comment('The word written in Hiragana (acting as Furigana)');
            $table->string('word_kanji')->nullable()->comment('The word written with Kanji (optional)');
            $table->string('romaji')->comment('The Romaji representation of the pronunciation');
            $table->string('meaning')->comment('The English meaning of the word');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
