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
        Schema::create('CATEGORIE', function (Blueprint $table) {
            $table->id();
            $table->string('LABEL_CATEGORIE')->nullable(false);
            $table->integer('COMPTE')->nullable(false);
            $table->boolean('ACTIVED')->default(true)->nullable(false);
            $table->timestamps();

            $table->foreign('COMPTE')->references('COMPTE')->on('COMPTE')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('CATEGORIE', function(Blueprint $table){
            $table->dropForeign(['COMPTE']);
        });
        Schema::dropIfExists('CATEGORIE');
    }
};
