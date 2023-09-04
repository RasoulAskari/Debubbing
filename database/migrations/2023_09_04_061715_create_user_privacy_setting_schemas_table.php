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
        Schema::create('user_privacy_setting_schemas', function (Blueprint $table) {
            $table->id();
            $table
                ->uuid("user_id")
                ->references("users.id")
                ->deferrable("deferred")
                ->index("user_privacy_user_id_index", "hash");
            $table
                ->enum("privacy_type", ["follow_list", "profile_privacy"])
                ->index("user_privacy_type_index", "hash");
            $table->string("privacy_value")->index("user_privacy_value_index", "hash");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_privacy_setting_schemas');
    }
};
