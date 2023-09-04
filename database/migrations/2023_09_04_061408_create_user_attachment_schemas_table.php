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
        Schema::create('user_attachment_schemas', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_picture');
            $table
                ->foreign("profile_picture")
                ->references("id")->on('attachment_schemas')
                ->deferrable("deferred");
            $table->unsignedBigInteger('cover_photo');

            $table
                ->foreign("cover_photo")
                ->references("id")->on('attachment_schemas')
                ->deferrable("deferred");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_attachment_schemas');
    }
};
