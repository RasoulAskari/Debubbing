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
        Schema::create('post_mention_schemas', function (Blueprint $table) {
            $table->id();

            $table
                ->unsignedBigInteger("post_id")
                ->unsigned()
                ->nullable()
                ->index("post_mention_post_id_index", "hash");
            $table->foreign("post_id")->references("id")->on('post_schemas')->deferrable("deferred");
            $table
                ->uuid("user_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("post_mention_user_id_index", "hash");
            $table->timestamps(true, true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_mention_schemas');
    }
};
