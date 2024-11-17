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
        Schema::create('madrasha_information', function (Blueprint $table) {
            $table->id();
            $table->string('madrasha_name_bn', 300);
            $table->string('madrasha_name_en', 300);
            $table->string('madrasha_name_ar', 300);
            $table->string('Elhaq_no');
            $table->integer('madrasha_id')->unique();
            $table->integer('M_type');
            $table->integer('stage');
            $table->integer('stage_serial');
            $table->string('village', 300);
            $table->string('thana', 300);
            $table->string('post', 300);
            $table->string('address', 300);
            $table->string('mobile_number', 200); // Changed to string
            $table->string('mobile_number_2', 200); // Changed to string
            $table->string('Estabilishyear', 300);
            $table->string('Principle_name', 250);
            $table->string('post_code', 200);
            $table->unsignedBigInteger('student_id');

            $table->foreign('student_id')
                  ->references('id')
                  ->on('student_infromations')
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
        Schema::dropIfExists('madrasha_information');
    }
};
