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
        Schema::create('country_schemas', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("iso3")->index("country_iso2_index", "hash");
            $table->string("iso2")->index("country_iso3_index", "hash");
            $table->string("numeric_code");
            $table->string("phone_code");
            $table->string("capital");
            $table->string("currency");
            $table->string("currency_name");
            $table->string("currency_symbol");
            $table->string("tld");
            $table->string("native");
            $table->string("region");
            $table->string("subregion");
            $table->json("timezones");
            $table->json("translations");
            $table->string("latitude");
            $table->string("longitude");
            $table->string("emoji");
            $table->string("emojiU");
            $table->string("nationality");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_schemas');
    }
};
