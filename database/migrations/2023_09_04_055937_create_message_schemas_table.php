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
        Schema::create('message_schemas', function (Blueprint $table) {
            $table->id();
            $table->text("message")->index("message_message_index", "btree");
            $table
                ->uuid("sender_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("message_sender_id_index", "hash");
            $table
                ->unsignedBigInteger("chat_id");
            $table->foreign("chat_id")->references("id")->on('chat_schemas')->deferrable("deferred");
            $table
                ->enum("attachment_type", ["none", "voice", "image_video"])
                ->default("none");
            $table
                ->integer("reply_to")
                ->unsigned()
                ->nullable()
                ->index("message_reply_index", "hash");
            $table->json("recipients")->nullable();

            $table->boolean("seen")->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_schemas');
    }
};
