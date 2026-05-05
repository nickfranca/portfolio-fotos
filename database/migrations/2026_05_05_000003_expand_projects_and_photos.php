<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projetos', function (Blueprint $table) {
            if (! Schema::hasColumn('projetos', 'ordem')) {
                $table->unsignedInteger('ordem')->default(0)->after('imagem');
            }

            if (! Schema::hasColumn('projetos', 'ativo')) {
                $table->boolean('ativo')->default(true)->after('ordem');
            }
        });

        Schema::table('fotos', function (Blueprint $table) {
            if (! Schema::hasColumn('fotos', 'projeto_id')) {
                $table->foreignId('projeto_id')->nullable()->after('id')->constrained('projetos')->nullOnDelete();
            }
        });

        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE projetos MODIFY tag VARCHAR(255) NULL');
            DB::statement('ALTER TABLE projetos MODIFY descricao TEXT NULL');
            DB::statement('ALTER TABLE projetos MODIFY imagem VARCHAR(255) NULL');
            DB::statement('ALTER TABLE projetos MODIFY destaque TINYINT(1) NOT NULL DEFAULT 0');
        }
    }

    public function down(): void
    {
        Schema::table('fotos', function (Blueprint $table) {
            if (Schema::hasColumn('fotos', 'projeto_id')) {
                $table->dropConstrainedForeignId('projeto_id');
            }
        });

        Schema::table('projetos', function (Blueprint $table) {
            if (Schema::hasColumn('projetos', 'ativo')) {
                $table->dropColumn('ativo');
            }

            if (Schema::hasColumn('projetos', 'ordem')) {
                $table->dropColumn('ordem');
            }
        });
    }
};
