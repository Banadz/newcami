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
        Schema::create('DEMANDE', function (Blueprint $table) {
            $table->id();
            $table->string('REF_DEMANDE')->nullable(false);
            $table->foreignId('id_article')->references('id')->on('ARTICLE')->onDelete('cascade');
            $table->integer('QUANTITE')->nullable(false);
            $table->integer('STOCK');
            $table->string('UNITE');
            $table->string('ETAT_DEMANDE')->nullable(false);
            $table->timestamps();
            
            $table->foreign('REF_DEMANDE')->references('REFERENCE')->on('REF_DEMANDE')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('DEMANDE', function(Blueprint $table){
            $table->dropForeign(['REF_DEMANDE']);
        });
        Schema::table('DEMANDE', function (Blueprint $table){
            $table->dropForeign('id_article');
        });

        Schema::dropIfExists('DEMANDE');
    }
};
