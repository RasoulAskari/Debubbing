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
        Schema::create('comment_schemas', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger("post_id")
                ->nullable();
            $table
                ->foreign("post_id")
                ->references("id")->on('post_schemas')
                ->deferrable("deferred")
                ->onDelete("SET NULL");
            $table
                ->uuid("user_id")
                ->index("comment_user_id_index", "hash")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->nullable()
                ->onDelete("SET NULL");
            $table->text("content")->index("comment_content_index", "btree");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_schemas');
    }
};
