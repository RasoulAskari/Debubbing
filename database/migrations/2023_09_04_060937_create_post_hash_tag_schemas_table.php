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
        Schema::create('post_hash_tag_schemas', function (Blueprint $table) {
            $table->id();

            $table
                ->unsignedBigInteger("post_id");
            $table->foreign("post_id")->references("id")->on('post_schemas')->deferrable("deferred");
            $table
                ->unsignedBigInteger("hash_tag_id")
                ->nullable();
            $table->foreign("hash_tag_id")->references("id")->on('post_schemas')->deferrable("deferred");
            $table->timestamps(true, true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_hash_tag_schemas');
    }
};
