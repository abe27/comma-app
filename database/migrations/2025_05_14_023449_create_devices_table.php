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
        Schema::create('devices', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('device_type_id')->constrained();
            $table->string('name');
            $table->string('asset_tag')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
