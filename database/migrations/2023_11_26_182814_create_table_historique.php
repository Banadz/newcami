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
        Schema::create('HISTORIQUE', function (Blueprint $table) {
            $table->id();

            $table->integer('MATRICULE')->nullable(true);
            $table->string('ETAT_MAT')->nullable(true);

            $table->dateTime('DATE_DEB')->nullable(false);
            $table->dateTime('DATE_FIN')->nullable(false);
            $table->boolean('ACTIVED')->default(true)->nullable(false);

            $table->foreignId('id_materiel')->references('id')->on('MATERIEL')->onDelete('cascade');
            $table->foreign('MATRICULE')->references('MATRICULE')->on('AGENT')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('HISTORIQUE', function (Blueprint $table){
            $table->dropForeign('id_materiel');
        });

        Schema::table('HISTORIQUE', function (Blueprint $table){
            $table->dropForeign('MATRICULE');
        });
        Schema::dropIfExists('HISTORIQUE');
    }
};
