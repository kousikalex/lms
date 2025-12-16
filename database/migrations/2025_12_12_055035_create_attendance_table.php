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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('trainer_id');
        $table->date('date');
        $table->time('punch_in')->nullable();
        $table->time('punch_out')->nullable();
        $table->string('status')->default(0); // 0 = absent, 1 = present
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
