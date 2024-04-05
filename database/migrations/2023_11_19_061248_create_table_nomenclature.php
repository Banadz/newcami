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
        Schema::create('NOMENCLATURE', function (Blueprint $table) {
            $table->id();
            $table->string('NOMENCLATURE')->nullable(false);
            $table->string('DETAIL_NOM')->nullable(false);
            $table->boolean('ACTIVED')->default(true)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NOMENCLATURE');
    }
};
