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
        Schema::create('COMPTE', function (Blueprint $table) {
            $table->integer('COMPTE')->primary();
            $table->string('LABEL_COMPTE')->nullable(false);
            $table->boolean('ACTIVED')->default(true)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('COMPTE');
    }
};
