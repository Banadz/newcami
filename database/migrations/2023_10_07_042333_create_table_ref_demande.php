<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('REF_DEMANDE', function (Blueprint $table) {
            $table->id();
            $table->string('REFERENCE')->unique()->nullable(false);
            $table->integer('MATRICULE')->nullable(false);
            $table->string('ETAT')->nullable(false);

            $table->dateTime('DATE_DEMANDE')->nullable(false);
            $table->dateTime('VALIDATION')->nullable(true);
            $table->dateTime('LIVRAISON')->nullable(true);
            $table->string('CODE_SERVICE')->nullable(false);

            $table->timestamps();

            $table->foreign('CODE_SERVICE')->references('CODE_SERVICE')->on('SERVICE')->onDelete('cascade');
            $table->foreign('MATRICULE')->references('MATRICULE')->on('AGENT')->onDelete('cascade');
        });
        // DB::statement("ALTER TABLE REF_DEMANDE AUTO_INCREMENT = CONCAT( YEAR(CURDATE()), '/1')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('REF_DEMANDE', function(Blueprint $table){
            $table->dropForeign(['MATRICULE']);
        });
        Schema::table('REF_DEMANDE', function(Blueprint $table){
            $table->dropForeign(['CODE_SERVICE']);
        });
        Schema::dropIfExists('REF_DEMANDE');
    }
};
