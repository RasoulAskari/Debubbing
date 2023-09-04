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
        Schema::create('reason_schemas', function (Blueprint $table) {
            $table->id();
            $table->integer("reasonable_id");
            $table->string("reasonable_type");
            $table->string("prev_state");
            $table->string("new_state");
            $table->text("reason");
            $table
                ->uuid("changed_by")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->nullable()
                ->onDelete("SET NULL");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reason_schemas');
    }
};
