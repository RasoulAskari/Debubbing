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
        Schema::create('user_verify_attachment_schemas', function (Blueprint $table) {
            $table->id();
            $table->uuid("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on('user_schemas')->deferrable("deferred");
            $table->unsignedBigInteger("attachment_id")->nullable();
            $table
                ->foreign("attachment_id")
                ->references("id")->on('attachment_schemas')
                ->deferrable("deferred");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_verify_attachment_schemas');
    }
};
