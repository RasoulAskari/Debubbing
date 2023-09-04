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
        Schema::create('attachment_schemas', function (Blueprint $table) {
            $table->id();
            $table->string("url")->index("attachment_url_index", "btree")->notNullable();
            $table->integer("height")->index("attachment_height_index", "hash")->nullable();
            $table->integer("width")->index("attachment_width_index", "hash")->nullable();
            $table->string("duration")->nullable();
            $table->string("mime_type")->index("attachment_mime_type_index", "hash");
            $table->integer("size")->nullable();
            $table->enum("uploaded_by_type", ["admin", "user"]);
            $table->uuid("uploaded_by")->index("attachment_uploaded_by_index", "hash");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachment_schemas');
    }
};
