<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id('applicant_id');  // Auto-incrementing primary key
            $table->string('job_role');
            $table->string('name');
            $table->string('phone');
            $table->date('date');
            $table->string('resume')->nullable(); // Path to the uploaded resume
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
