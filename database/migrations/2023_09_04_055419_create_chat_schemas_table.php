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
        Schema::create('chat_schemas', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("is_accepted")->defaultTo(true);
            $table->timestamp("last_messaged_at");
            $table->json("recipients")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_schemas');
    }
};
