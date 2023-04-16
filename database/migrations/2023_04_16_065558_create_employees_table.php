<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            // $table->id();
            // $table->bigIncrements('id');
            $table->text('EmployeeName');
            $table->text('EmpID');
            $table->binary('MarriedID')->nullable();
            $table->integer('MaritalStatusID')->nullable();
            $table->integer('GenderID')->nullable();
            $table->integer('EmpStatusID')->nullable();
            $table->integer('DeptID')->nullable();
            $table->integer('PerfScoreID')->nullable();
            $table->binary('FromDiversityJobFairID')->nullable();
            $table->float('Salary')->nullable();
            $table->binary('Termd')->nullable();
            $table->integer('PositionID')->nullable();
            $table->text('Position')->nullable();
            $table->text('State')->nullable();
            $table->text('Zip')->nullable();
            $table->date('DOB')->nullable();
            $table->text('Sex')->nullable();
            $table->text('MaritalDesc')->nullable();
            $table->text('CitizenDesc')->nullable();
            $table->text('HispanicLatino')->nullable();
            $table->text('RaceDesc')->nullable();
            $table->date('DateofHire')->nullable();
            $table->date('DateofTermination')->nullable();
            $table->text('TermReason')->nullable();
            $table->text('EmploymentStatus')->nullable();
            $table->text('Department')->nullable();
            $table->text('ManagerName')->nullable();
            $table->integer('ManagerID')->nullable();
            $table->text('RecruitmentSource')->nullable();
            $table->text('PerformanceScore')->nullable();
            $table->float('EngagementSurvey')->nullable();
            $table->integer('EmpSatisfaction')->nullable();
            $table->integer('SpecialProjectsCount')->nullable();
            $table->date('LastPerformanceReviewDate')->nullable();
            $table->integer('DaysLateLast30')->nullable();
            $table->integer('Absences')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
