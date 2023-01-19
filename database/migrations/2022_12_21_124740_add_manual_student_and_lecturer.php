<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddManualStudentAndLecturer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->string('student_name')->nullable();
            $table->string('lecturer_name')->nullable();
            $table->string('student_study_program')->nullable();
            $table->string('lecturer_study_program')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('lecturer_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn('student_name');
            $table->dropColumn('lecturer_name');
            $table->dropColumn('student_study_program');
            $table->dropColumn('lecturer_study_program');
            $table->dropColumn('student_phone');
            $table->dropColumn('lecturer_phone');
        });
    }
}
