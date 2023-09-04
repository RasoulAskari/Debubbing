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
        Schema::create('report_schemas', function (Blueprint $table) {
            $table->id();
            $table->string("reportable_id")->index("report_repotable_id_index", "hash");
            $table->string("reportable_type")->index("report_reportable_index", "hash");
            $table
                ->enum("status", ["pending", "rejected", "accepted"])
                ->default("pending")
                ->index("report_status_id_index", "hash");
            $table->text("report");
            $table
                ->uuid("reported_by")
                ->references("id")->on('user_schemas')
                ->deferrable("deferred")
                ->nullable()
                ->onDelete("SET NULL")
                ->index("report_reported_by_index", "hash");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_schemas');
    }
};
