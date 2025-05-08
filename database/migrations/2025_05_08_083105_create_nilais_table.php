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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_id')->constrained('studies');
            $table->char('point', 3)->default(0);
            $table->char('tugas', 3)->default(0);
            $table->char('pre_uts', 3)->default(0);
            $table->char('kuis_1', 3)->default(0);
            $table->char('uts', 3)->default(0);
            $table->char('pre_uas', 3)->default(0);
            $table->char('kuis_2', 3)->default(0);
            $table->char('uas', 3)->default(0);
            $table->float('IPK', 3)->default(0);
            $table->char('grade', 2)->default('D');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
