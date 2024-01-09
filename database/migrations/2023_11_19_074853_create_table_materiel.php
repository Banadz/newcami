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
        Schema::create('MATERIEL', function (Blueprint $table) {
            $table->id();
            $table->string('REF_MAT')->nullable(true)->unique();
            $table->string('DESIGN_MAT')->nullable(false);
            $table->string('SPEC_MAT');
            $table->string('ETAT_MAT');
            $table->dateTime('DATE_DEB');
            $table->integer('MATRICULE')->nullable(true);
            $table->string('CODE_SERVICE')->nullable(false);

            $table->foreignId('id_nomenclature')->references('id')->on('NOMENCLATURE')->onDelete('cascade');
            $table->foreignId('id_categorie')->references('id')->on('CATEGORIE')->onDelete('cascade');
            $table->foreignId('id_origine')->references('id')->on('ORIGINE_MAT')->onDelete('cascade');
            $table->foreign('MATRICULE')->references('MATRICULE')->on('AGENT')->onDelete('cascade');
            $table->foreign('CODE_SERVICE')->references('CODE_SERVICE')->on('SERVICE')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('MATERIEL', function(Blueprint $table){
            $table->dropForeign(['id_nomenclature']);
        });
        Schema::table('MAERIEL', function (Blueprint $table){
            $table->dropForeign('id_categorie');
        });

        Schema::table('MAERIEL', function (Blueprint $table){
            $table->dropForeign('id_origine');
        });

        Schema::table('MAERIEL', function (Blueprint $table){
            $table->dropForeign('MATRICULE');
        });
        Schema::table('MAERIEL', function (Blueprint $table){
            $table->dropForeign('CODE_SERVICE');
        });
        Schema::dropIfExists('MATERIEL');
    }
};
