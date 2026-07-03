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
       Schema::rename('academic_year', 'academic_years');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('academic_years', 'academic_year');
    }
};
