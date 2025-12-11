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
         Schema::table('trainers', function (Blueprint $table) {
            $table->enum('trainer_type', ['inhouse', 'freelancer'])->after('experience');
            $table->string('file_upload')->nullable()->after('trainer_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainers', function (Blueprint $table) {
            //
            $table->dropColumn(['trainer_type', 'file_upload']);
        });
    }
};
