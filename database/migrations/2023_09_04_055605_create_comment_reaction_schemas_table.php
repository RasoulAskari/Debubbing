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
        Schema::create('comment_reaction_schemas', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedBigInteger("comment_id")->nullable();
            $table->foreign("comment_id")->references("id")->on('comment_schemas')->deferrable("deferred");

            $table->uuid("user_id")->references("users.id")->deferrable("deferred");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_reaction_schemas');
    }
};
