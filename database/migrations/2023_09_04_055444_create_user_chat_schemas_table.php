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
        Schema::create('user_chat_schemas', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger("chat_id")->notNullable();
            $table->foreign("chat_id")->references("id")->on("chat_schemas")->deferrable("deferred");
            $table
                ->uuid("user_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("user_chat_user_id_index", "hash");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_chat_schemas');
    }
};
