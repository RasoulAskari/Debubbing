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
        Schema::create('follow_request_schemas', function (Blueprint $table) {
            $table->id();
            $table
                ->uuid("receiver_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("follow_request_receiver_index", "hash");
            $table
                ->uuid("sender_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("follow_request_sender_index", "hash");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follow_request_schemas');
    }
};
