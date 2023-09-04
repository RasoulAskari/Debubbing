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
        Schema::create('post_schemas', function (Blueprint $table) {
            $table->id();
            $table->text("content")->index("post_content_index", "btree")->nullable();
            $table->enum("privacy", ["public", "followers", "only_me"])->nullable();
            $table->enum("post_type", ["profile", "cover", "share", "post"])->nullable();
            $table
                ->enum("status", ["published", "suspended"])
                ->index("post_status_index", "hash")
                ->default("published");

            $table->enum("attachment_type", ["none", "img", "video"])->nullable();
            $table
                ->uuid("created_by")
                ->references("id")->on('user_schemas ')
                ->deferrable("deferred")
                ->nullable()
                ->onDelete("SET NULL")
                ->index()
                ->index("post_created_by_index", "hash");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_schemas');
    }
};
