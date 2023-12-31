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
        Schema::create('user_login_code_schemas', function (Blueprint $table) {
            $table->id();
            $table->string("phone")->index("login_code_phone_index", "hash");
            $table->string("code")->index("login_code_code_index", "hash");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_login_code_schemas');
    }
};
