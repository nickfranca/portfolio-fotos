<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fotos', function (Blueprint $table) {
            if (! Schema::hasColumn('fotos', 'titulo')) {
                $table->string('titulo')->nullable()->after('id');
            }

            if (! Schema::hasColumn('fotos', 'descricao')) {
                $table->text('descricao')->nullable()->after('titulo');
            }
        });

        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE fotos MODIFY ordem INT UNSIGNED NOT NULL DEFAULT 0');
            DB::statement('ALTER TABLE fotos MODIFY ativo TINYINT(1) NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE artigos MODIFY resumo TEXT NULL');
            DB::statement('ALTER TABLE artigos MODIFY conteudo LONGTEXT NOT NULL');
            DB::statement('ALTER TABLE artigos MODIFY imagem_capa VARCHAR(255) NULL');
            DB::statement('ALTER TABLE artigos MODIFY categoria VARCHAR(255) NULL');
            DB::statement('ALTER TABLE artigos MODIFY tempo_leitura VARCHAR(255) NULL');
            DB::statement('ALTER TABLE artigos MODIFY destaque TINYINT(1) NOT NULL DEFAULT 0');
        }
    }

    public function down(): void
    {
        Schema::table('fotos', function (Blueprint $table) {
            if (Schema::hasColumn('fotos', 'descricao')) {
                $table->dropColumn('descricao');
            }

            if (Schema::hasColumn('fotos', 'titulo')) {
                $table->dropColumn('titulo');
            }
        });
    }
};
