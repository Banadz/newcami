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
        Schema::create('REF_ORIGINE', function (Blueprint $table) {
            $table->id();
            $table->string('REFERENCE')->unique()->nullable(false);
            $table->string('CODE_SERVICE')->nullable(false);
            $table->string('FACTURE')->nullable(true);
            $table->string('PRIX_TOTAL')->nullable(true);;
            $table->dateTime('DATE_ORIGINE')->nullable(false);
            $table->timestamps();

            $table->foreign('CODE_SERVICE')->references('CODE_SERVICE')->on('SERVICE')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('REF_ORIGINE', function(Blueprint $table){
            $table->dropForeign(['CODE_SERVICE']);
        });
        Schema::dropIfExists('REF_ORIGINE');
    }
};
