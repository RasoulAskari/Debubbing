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
        Schema::create('state_schemas', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("state_code");
            $table->string("latitude");
            $table->string("longitude");
            $table->string("type")->nullable();
            $table
                ->unsignedBigInteger("country_id");
            $table->foreign("country_id")->references("id")->on('countries_schemas')->deferrable("deferred");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_schemas');
    }
};
