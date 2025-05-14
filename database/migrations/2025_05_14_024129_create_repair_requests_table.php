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
        Schema::create('repair_requests', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->constrained();
            $table->foreignUlid('device_type_id')->constrained();
            $table->foreignUlid('device_id')->constrained();
            $table->string('job_no')->unique();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('location')->nullable();
            $table->foreignUlid('action_status_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_requests');
    }
};
