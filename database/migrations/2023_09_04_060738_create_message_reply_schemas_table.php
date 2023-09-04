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
        Schema::create('message_reply_schemas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("message_id")->unsigned()->notNullable();
            $table->foreign("message_id")->references("id")->on('message_schemas')->deferrable("deferred");
            $table->unsignedBigInteger("attachment_id")->notNullable();
            $table
                ->foreign("attachment_id")
                ->references("id")->on('message_attachment_schemas')
                ->deferrable("deferred");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_reply_schemas');
    }
};
