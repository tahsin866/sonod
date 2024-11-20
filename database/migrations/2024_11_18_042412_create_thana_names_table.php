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
        Schema::create('thana_names', function (Blueprint $table) {
            $table->id();
            $table->integer('TID');
            $table->string('Thana_Name');
            $table->unsignedBigInteger('district_Id');

            $table->foreign('district_Id')
                ->references('id')
                ->on('district_names')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger('division_Id');

            $table->foreign('division_Id')
                ->references('id')
                ->on('division_names')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thana_names');
    }
};
