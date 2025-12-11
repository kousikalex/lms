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
        Schema::create('subcourses', function (Blueprint $table) {
           $table->id();

            // Foreign key to courses table
            $table->unsignedBigInteger('course_id');

            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')
                  ->onDelete('cascade'); // if course deleted -> subcourses deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('subcourses');
    }
};
