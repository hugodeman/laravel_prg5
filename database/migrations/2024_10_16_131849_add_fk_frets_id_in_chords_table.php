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
        Schema::table('chords', function (Blueprint $table) {
            $table->foreignId('fret_id') ->nullable()->constrained('frets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chords', function (Blueprint $table) {
            $table->dropForeign(['fret_id']);
            $table ->dropColumn('fret_id');
        });
    }
};
