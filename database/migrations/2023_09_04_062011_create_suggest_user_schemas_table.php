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
        Schema::create('suggest_user_schemas', function (Blueprint $table) {
            $table->id();
            $table
                ->uuid("user_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("suggest_user_id_index", "hash");
            $table
                ->uuid("created_by")
                ->references("id")->on('admins')
                ->deferrable("deferred")
                ->index("suggest_created_by_index", "hash");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggest_user_schemas');
    }
};
