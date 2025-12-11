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
        Schema::create('college', function (Blueprint $table) {
            $table->id();
             $table->string('collegename');
              $table->string('Logo')->nullable();
             $table->string('contact_person');
             $table->string('contact_number');
             $table->string('address');
             $table->string('landmark');
             $table->string('district');
             $table->string('state');
            $table->text('description');             // Description (Long text)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('college');
    }
};
