<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE configuracaos MODIFY valor TEXT NULL');
        }

        Schema::table('configuracaos', function (Blueprint $table) {
            if (! $this->hasIndex('configuracaos', 'configuracaos_chave_unique')) {
                $table->unique('chave');
            }
        });
    }

    public function down(): void
    {
        Schema::table('configuracaos', function (Blueprint $table) {
            $table->dropUnique('configuracaos_chave_unique');
        });
    }

    private function hasIndex(string $table, string $index): bool
    {
        return collect(Schema::getIndexes($table))->contains(fn (array $item) => $item['name'] === $index);
    }
};
