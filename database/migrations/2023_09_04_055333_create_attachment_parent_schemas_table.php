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
        Schema::create('attachment_parent_schemas', function (Blueprint $table) {
            $table
                ->unsignedBigInteger("parent_id")

                ->nullable();
            $table
                ->foreign("parent_id")
                ->references("id")->on('attachment_schemas');


            $table
                ->unsignedBigInteger("thumbnail_id")
                ->nullable();
            $table
                ->foreign("thumbnail_id")
                ->references("id")->on('attachment_schemas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachment_parent_schemas');
    }
};
