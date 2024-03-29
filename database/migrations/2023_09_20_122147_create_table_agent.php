<?php

use App\Models\Division;
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
        Schema::create('AGENT', function (Blueprint $table) {
            $table->integer('MATRICULE')->primary();
            $table->string('NOM')->nullable(false);
            $table->string('CODE_DIVISION')->nullable(false);
            $table->string('PRENOM');
            $table->string('GENRE')->nullable(false);
            $table->string('PHOTO');
            $table->rememberToken();
            $table->string('FONCTION')->nullable(false);
            $table->string('TYPE')->nullable(false);
            $table->string('PSEUDO')->nullable(false);
            $table->string('EMAIL');
            $table->string('PASSWORD')->nullable(false);
            $table->string('ADRESSE_PHYSIQUE');
            $table->string('TELEPHONE')->nullable(false);
            $table->boolean('ACTIVED')->default(true)->nullable(false);
            $table->timestamps();


            $table->foreign('CODE_DIVISION')->references('CODE_DIVISION')->on('DIVISION')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('AGENT', function(Blueprint $table){
            $table->dropForeign(['CODE_DIVISION']);
        });
        Schema::dropIfExists('AGENT');

    }
};
