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
        Schema::create('ORIGINE', function (Blueprint $table) {
            $table->id();
            $table->string('REF_ORIGINE')->nullable(false);
            $table->foreignId('id_article')->references('id')->on('ARTICLE')->onDelete('cascade');
            $table->integer('QUANTITE')->nullable(false);
            $table->integer('STOCK');
            $table->integer('PRIX');
            $table->integer('MONTANT');
            $table->string('UNITE');
            $table->string('ORIGINE')->nullable(false);

            $table->timestamps();

            $table->foreign('ORIGINE')->references('CODE_SERVICE')->on('SERVICE')->onDelete('cascade');
            $table->foreign('REF_ORIGINE')->references('REFERENCE')->on('REF_ORIGINE')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ORIGINE', function(Blueprint $table){
            $table->dropForeign(['REF_ORIGINE']);
        });
        Schema::table('ORIGINE', function (Blueprint $table){
            $table->dropForeign('id_article');
        });
        Schema::table('ORIGINE', function(Blueprint $table){
            $table->dropForeign(['ORIGINE']);
        });
        Schema::dropIfExists('ORIGINE');
    }
};
