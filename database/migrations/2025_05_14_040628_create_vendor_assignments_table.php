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
        Schema::create('vendor_assignments', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('repair_request_id')->constrained();
            $table->foreignUlid('vendor_id')->constrained();
            $table->foreignUlid('assignment_by_id')->constrained('users');
            $table->longText('note')->nullable();
            $table->foreignUlid('action_status_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_assignments');
    }
};
