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
        Schema::create('message_attachment_schemas', function (Blueprint $table) {
            $table->id();
            $table
                ->string("url")
                ->index("message_attachment_url_index", "btree")
                ->notNullable();
            $table
                ->integer("height")
                ->index("message_attachment_height_index", "hash")
                ->nullable();
            $table
                ->integer("width")
                ->index("message_attachment_width_index", "hash")
                ->nullable();
            $table->string("duration")->nullable();
            $table->string("mime_type")->index("amessage_ttachment_mime_type_index", "hash");
            $table->integer("size")->nullable();
            $table->enum("uploaded_by_type", ["admin", "user"]);
            $table
                ->uuid("uploaded_by")
                ->index("message_attachment_uploaded_by_index", "hash");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_attachment_schemas');
    }
};
