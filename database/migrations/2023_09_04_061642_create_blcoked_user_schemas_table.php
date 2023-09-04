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
        Schema::create('blcoked_user_schemas', function (Blueprint $table) {
            $table->id();
            $table
                ->uuid("user_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("user_block_user_id_index", "hash");
            $table
                ->uuid("blocked_user_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("user_block_blocked_id_index", "hash");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blcoked_user_schemas');
    }
};
