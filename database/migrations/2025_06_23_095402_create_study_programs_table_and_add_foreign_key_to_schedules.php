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
        Schema::create('study_programs', function (Blueprint $table) {
            $table->id();
            // Naziv studijskog programa, npr. "Ekonomija" ili "Informatika"
            $table->string('name');
            // Opcioni opis studijskog programa
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 2. Ubacivanje podrazumevanog studijskog programa
        \Illuminate\Support\Facades\DB::table('study_programs')->insert([
            'name' => 'Економија',
            'description' => 'Економија',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Modifikacija tabele 'schedules' - dodavanje kolone sa podrazumevanom vrednošću
        Schema::table('schedules', function (Blueprint $table) {
            // Dodaj kolonu 'study_program_id' sa default vrednošću 1 (koja postoji u study_programs)
            $table->unsignedBigInteger('study_program_id')->default(1)->after('id');

            // Postavljanje stranog ključa
            $table->foreign('study_program_id')
                ->references('id')
                ->on('study_programs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_programs_table_and_add_foreign_key_to_schedules');
    }
};
