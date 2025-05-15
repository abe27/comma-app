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
        Schema::create('repair_logs', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('seq');
            $table->foreignUlid('repair_request_id')->constrained();
            $table->foreignUlid('updated_by_id')->constrained('users');
            $table->foreignUlid('old_status_id')->nullable()->constrained('action_statuses');
            $table->foreignUlid('new_status_id')->nullable()->constrained('action_statuses');
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_logs');
    }
};
