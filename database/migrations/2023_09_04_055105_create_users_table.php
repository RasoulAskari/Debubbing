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
        Schema::create('users', function (Blueprint $table) {
            $table
                ->uuid("id")
                ->index("user_id_index", "hash");
            $table->string("full_name")->index("user_fullname_index", "btree");
            $table->string("username")->index("user_username_index", "btree");
            $table->string("phone_no")->index("user_phone_no_index", "btree");
            $table->text("bio")->nullable();
            $table->string("password")->nullable();
            $table->timestamp("birth_date")->nullable();
            $table->enum("gender", ["male", "female"]);
            $table
                ->enum("status", ["active", "suspended"])
                ->default("active")
                ->index("user_status_index", "hash");
            $table
                ->enum("profile_type", ["public", "private"])
                ->default("public")
                ->index("user_profile_type_index", "hash");

            $table->integer("profile_picture")->unsigned()->nullable();
            $table->integer("cover_photo")->unsigned()->nullable();
            $table->timestamp("phone_verified_at")->nullable();
            $table->timestamp("suspended_until")->nullable();
            $table->integer("suspended_id")->nullable();

            $table
                ->decimal("latitude", 14, 8)
                ->nullable()
                ->index("user_latitude_index", "hash");
            $table
                ->decimal("longitude", 14, 8)
                ->nullable()
                ->index("user_longitude_index", "hash");

            $table->unsignedBigInteger("state_id")->nullable();
            $table->foreign("state_id")->references("id")->on('state_schemas')->deferrable("deferred");
            $table->boolean("verified")->default(false);
            $table
                ->uuid("verified_by")
                ->references("id")->on('admins')
                ->deferrable("deferred")
                ->index("user_verified_by_index", "hash");
            $table->timestamp("last_online")->nullable();

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
