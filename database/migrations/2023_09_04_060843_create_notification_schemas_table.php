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
        Schema::create('notification_schemas', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("body")->nullable();
            $table->json("data")->nullable();
            $table->boolean("seen")->default(false);
            $table->string("message_id")->nullable();
            $table
                ->uuid("user_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("notifications_user_id_index", "hash");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_schemas');
    }
};
