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
        Schema::create('language_schemas', function (Blueprint $table) {
            $table->id();

            $table->string("code")->index("language_code_index", "hash");
            $table->string("name");
            $table->string("native");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_schemas');
    }
};
