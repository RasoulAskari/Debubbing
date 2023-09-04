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
        Schema::create('post_attachment_schemas', function (Blueprint $table) {
            $table->id();

            $table

                ->unsignedBigInteger("post_id")
                ->nullable();
            $table->foreign("post_id")->references("id")->on('post_schemas')->deferrable("deferred");

            $table
                ->unsignedBigInteger("attachment_id")
                ->nullable();
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
        Schema::dropIfExists('post_attachment_schemas');
    }
};
