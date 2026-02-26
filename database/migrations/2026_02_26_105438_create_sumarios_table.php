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
        Schema::create('sumarios', function (Blueprint $table) {
            $table->id();
            $table->string("numero_ordem");
            $table->string("titulo");
            $table->string("pagina");
            $table->string("ordem");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumarios');
    }
};
