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
        Schema::create('ARTICLE', function (Blueprint $table) {
            $table->id();
            $table->string('DESIGNATION')->nullable(false);
            $table->string('SPECIFICATION')->nullable(true);
            $table->string('UNITE')->nullable(false);
            $table->integer('EFFECTIF')->nullable(false);
            $table->boolean('DISPONIBLE');
            $table->string('CODE_SERVICE')->nullable(false);
            $table->boolean('ACTIVED')->default(true)->nullable(false);

            $table->foreign('CODE_SERVICE')->references('CODE_SERVICE')->on('SERVICE')->onDelete('cascade');
            $table->foreignId('id_categorie')->references('id')->on('CATEGORIE')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ARTICLE', function(Blueprint $table){
            $table->dropForeign(['CODE_SERVICE']);
        });
        Schema::table('ARTICLE', function (Blueprint $table){
            $table->$table->dropForeign('id_categorie');
        });

        Schema::dropIfExists('ARTICLE');
    }
};
