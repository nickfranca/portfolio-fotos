<?php

use App\Models\Foto;
use App\Models\Projeto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fotos', function (Blueprint $table) {
            if (! Schema::hasColumn('fotos', 'ajuste')) {
                $table->string('ajuste')->default('cover')->after('ativo');
            }

            if (! Schema::hasColumn('fotos', 'posicao_x')) {
                $table->string('posicao_x')->default('center')->after('ajuste');
            }

            if (! Schema::hasColumn('fotos', 'posicao_y')) {
                $table->string('posicao_y')->default('center')->after('posicao_x');
            }
        });

        $primeiroProjeto = Projeto::orderBy('ordem')->first();

        if ($primeiroProjeto) {
            Foto::whereNull('projeto_id')->update(['projeto_id' => $primeiroProjeto->id]);
        }
    }

    public function down(): void
    {
        Schema::table('fotos', function (Blueprint $table) {
            foreach (['posicao_y', 'posicao_x', 'ajuste'] as $column) {
                if (Schema::hasColumn('fotos', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
