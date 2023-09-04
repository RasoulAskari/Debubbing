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
        Schema::create('ad_schemas', function (Blueprint $table) {
            $table->id();
            $table->string("post_link");
            $table->integer("audience_count");
            $table->integer("views_count");
            $table->timestamp("expire_at");
            $table
                ->enum("status", ["active", "disabled", "expired"])
                ->index("ads_status_index", "hash")
                ->nullable();
            $table
                ->unsignedBigInteger("post_id")
                ->nullable();
            $table->foreign("post_id")->references("id")->on('post_schemas')->deferrable("deferred");
            $table
                ->uuid("created_by")
                ->references("id")->on('admins')
                ->deferrable("deferred")
                ->nullable()
                ->onDelete("SET NULL");

            $table->string("expire_job_id");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_schemas');
    }
};
