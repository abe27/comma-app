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
        Schema::create('repair_statuses', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('repair_request_id')->constrained();
            $table->integer('seq')->nullable()->default(0);
            $table->foreignUlid('assigned_to')->constrained('users');
            $table->longText('comment')->nullable();
            $table->foreignUlid('action_status_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_statuses');
    }
};
