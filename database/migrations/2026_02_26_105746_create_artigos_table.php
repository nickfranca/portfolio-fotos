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
        Schema::create('artigos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->string("slug");
            $table->string("titulo");
            $table->string("categoria")->nullable();
            $table->text("resumo")->nullable();
            $table->longText("conteudo");
            $table->string("imagem_capa")->nullable();
            $table->string("tempo_leitura")->nullable();
            $table->boolean("destaque")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artigos');
    }
};
