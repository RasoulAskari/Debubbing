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
        Schema::create('message_request_schemas', function (Blueprint $table) {
            $table->id();
            $table
                ->uuid("receiver_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("message_request_receiver_id_index", "hash");
            $table
                ->uuid("sender_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("message_request_sender_id_index", "hash");
            $table->integer("chat_id")->references("chats->id")->deferrable("deferred");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_request_schemas');
    }
};
