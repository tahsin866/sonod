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
        Schema::create('subject_name_mutawassitahs', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_code')->unique();
            $table->string('subject_name_bn');
            $table->string('subject_name_en');
            $table->string('subject_name_ar');
            $table->unsignedBigInteger('student_id');

            $table->foreign('student_id')
                  ->references('id')
                  ->on('student_infromations')
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();

                  $table->unsignedBigInteger('madrasha_id');

                  $table->foreign('madrasha_id')
                        ->references('id')
                        ->on('madrasha_information')
                        ->restrictOnDelete()
                        ->cascadeOnUpdate();

                        $table->timestamp('created_at')->useCurrent();
                        $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_name_mutawassitahs');
    }
};
