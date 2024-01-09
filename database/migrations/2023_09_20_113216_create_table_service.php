<?php

use App\Models\Service;
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
        Schema::create('SERVICE', function (Blueprint $table) {
            $table->string('CODE_SERVICE')->primary();
            $table->string('LABEL_SERVICE')->nullable(false)->unique();
            $table->string('ENTETE1');
            $table->string('ENTETE2');
            $table->string('ENTETE3');
            $table->string('ENTETE4');
            $table->string('ENTETE5');
            $table->string('SIGLE_SERVICE')->nullable(false);
            $table->string('VILLE_SERVICE')->nullable(false);
            $table->string('ADRESSE_SERVICE')->nullable(false);
            $table->string('CONTACT_SERVICE');
            $table->string('ADRESSE_MAIL');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SERVICE');
    }
};
