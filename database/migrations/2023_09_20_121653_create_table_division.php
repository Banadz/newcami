<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Service;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('DIVISION', function (Blueprint $table) {
            $table->string('CODE_DIVISION')->primary();
            $table->string('LABEL_DIVISION')->nullable(false);
            $table->string('CODE_SERVICE')->nullable(false);
            $table->boolean('ACTIVED')->default(true)->nullable(false);
            $table->timestamps();

            $table->foreign('CODE_SERVICE')->references('CODE_SERVICE')->on('SERVICE')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('DIVISION', function(Blueprint $table){
            $table->dropForeign(['CODE_SERVICE']);
        });
        Schema::dropIfExists('DIVISION');

    }
};
