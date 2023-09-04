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
        Schema::create('following_schemas', function (Blueprint $table) {
            $table->id();
            $table
                ->uuid("followed_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("following_followed_index", "hash");
            $table
                ->uuid("follower_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("following_follower_index", "hash");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('following_schemas');
    }
};
