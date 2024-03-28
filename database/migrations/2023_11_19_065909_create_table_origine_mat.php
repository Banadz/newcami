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
        Schema::create('ORIGINE_MAT', function (Blueprint $table) {
            $table->id();
            $table->string('REF_ORIGINE')->nullable(false);
            $table->integer('QUANTITE')->nullable(false);
            $table->integer('PRIX');
            $table->integer('MONTANT');
            $table->string('ORIGINE')->nullable(false);
            $table->boolean('ACTIVED')->default(true)->nullable(false);


            $table->foreign('ORIGINE')->references('CODE_SERVICE')->on('SERVICE')->onDelete('cascade');
            $table->foreign('REF_ORIGINE')->references('REFERENCE')->on('REF_ORIGINE')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ORIGINE_MAT', function(Blueprint $table){
            $table->dropForeign(['REF_ORIGINE']);
        });
        Schema::table('ORIGINE', function(Blueprint $table){
            $table->dropForeign(['ORIGINE']);
        });
        Schema::dropIfExists('ORIGINE_MAT');
    }
};
