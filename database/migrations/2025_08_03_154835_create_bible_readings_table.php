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
        Schema::create('bible_readings', function (Blueprint $table) {
            $table->id();
            $table->date('reading_date');
            $table->string('passage'); // e.g., 'Matius 1:1'
            $table->text('text')->nullable(); // Optional: the actual Bible text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bible_readings');
    }
};
