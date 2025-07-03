<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();

            $table->enum('type', ['class', 'exam'])
                ->comment('“class” = raspored časova, “exam” = raspored ispita');

            $table->string('title');

            $table->string('file_path');

            $table->boolean('is_active')
                ->default(true)
                ->comment('da li je ovaj raspored trenutno važeći');

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
