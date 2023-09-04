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
        Schema::create('user_account_prefrences', function (Blueprint $table) {
            $table->id();
            $table
                ->uuid("user_id")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->index("user_account_prefrences_user_id_index", "hash");
            $table->string("key")->index("user_account_prefrences_key_index", "hash");
            $table->string("value")->index("user_account_prefrences_value_index", "hash");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_account_prefrences');
    }
};
