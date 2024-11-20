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
        Schema::create('subject_name_fazilats', function (Blueprint $table) {
            $table->id();
            $table->integer('mishkat-1_code')->unique();
            $table->string('subject_mishkat-1_bn');
            $table->string('subject_mishkat-1_en');
            $table->string('subject_mishkat-1_ar');


            $table->integer('mishkat-2_code')->unique();
            $table->string('subject_mishkat-2_bn');
            $table->string('subject_mishkat-2_en');
            $table->string('subject_mishkat-2_ar');

            $table->integer('al-baydawi_code')->unique();
            $table->string('subject_al-baydawi_bn');
            $table->string('subject_al-baydawi_en');
            $table->string('subject_al-baydawi_ar');

            $table->integer('al-hidaya-3_code')->unique();
            $table->string('subject_al-hidaya-3_bn');
            $table->string('subject_al-hidaya-3_en');
            $table->string('subject_al-hidaya-3_ar');

            $table->integer('al-hidaya-4_code')->unique();
            $table->string('subject_al-hidaya-4_bn');
            $table->string('subject_al-hidaya-4_en');
            $table->string('subject_al-hidaya-4_ar');

            $table->integer('akaid_code')->unique();
            $table->string('subject_akaid_bn');
            $table->string('subject_akaid_en');
            $table->string('subject_akaid_ar');

            $table->integer('nukhbatil_code')->unique();
            $table->string('subject_nukhbatil-fikar_bn');
            $table->string('subject_nukhbatil-fikar_en');
            $table->string('subject_nukhbatil-fikar_ar');


            $table->integer('tahrik_code')->unique();
            $table->string('subject_tahrik_bn');
            $table->string('subject_tahrik_en');
            $table->string('subject_tahrik_ar');

            $table->integer('jalalain_code')->unique();
            $table->string('subject_jalalain-1_bn');
            $table->string('subject_jalalain-1_en');
            $table->string('subject_jalalain-1_ar');

            $table->integer('jalalain-2_code')->unique();
            $table->string('subject_jalalain-2_bn');
            $table->string('subject_jalalain-2_en');
            $table->string('subject_jalalain-2_ar');

            $table->integer('tahawi_code')->unique();
            $table->string('subject_tahawi_bn');
            $table->string('subject_tahawi_en');
            $table->string('subject_tahawi_ar');

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
        Schema::dropIfExists('subject_name_fazilats');
    }
};
