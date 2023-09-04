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
        Schema::create('forgot_password_schemas', function (Blueprint $table) {
            $table->id();
            $table->text("token")->index("forgot_password_token_index", "hash");
            $table
                ->uuid("admin_id")
                ->references("id")->on('administrators')
                ->deferrable("deferred")
                ->index("forgot_password_admin_id_index", "hash");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forgot_password_schemas');
    }
};
