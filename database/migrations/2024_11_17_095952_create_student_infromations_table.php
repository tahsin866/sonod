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
        Schema::create('student_infromations', function (Blueprint $table) {
            $table->id();
            $table->string('Student_name_bn', 255);
            $table->string('Student_name_en', 255);
            $table->string('Student_name_ar', 255);
            $table->string('stu_father_name_bn', 255);
            $table->string('stu_father_name_en', 255);
            $table->string('stu_father_name_ar', 255);
            $table->string('stu_mother_name_bn', 255);
            $table->string('stu_mother_name_en', 255);
            $table->string('stu_mother_name_ar', 255);
            $table->string('Nationality');
            $table->date('date_of_birth');
            $table->integer('Roll')->unique();
            $table->integer('reg_id')->unique();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_infromations');
    }
};
