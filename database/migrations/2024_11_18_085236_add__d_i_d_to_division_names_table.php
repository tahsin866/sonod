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
        Schema::table('division_names', function (Blueprint $table) {
             // Add an auto-incrementing 'id' column as the primary key
             $table->string('DID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('division_names', function (Blueprint $table) {
            //
        });
    }
};
