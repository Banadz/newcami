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
        Schema::create('SORTIE', function (Blueprint $table) {
            $table->id();
            $table->string('REF_SORTIE')->nullable(false)->unique();
            $table->string('OBJET')->nullable(false);
            $table->string('STATUT')->nullable(false);

            $table->dateTime('DATE')->nullable(false);
            $table->foreignId('id_materiel')->references('id')->on('MATERIEL')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('SORTIE', function (Blueprint $table){
            $table->dropForeign('id_materiel');
        });
        Schema::dropIfExists('SORTIE');
    }
};
