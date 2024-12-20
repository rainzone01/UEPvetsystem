<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedrecordsTable extends Migration
{
    public function up()
    {
        Schema::create('med_records', function (Blueprint $table) {
            $table->id('record_id');
            $table->string('patient_id');
            $table->string('owner_name');
            $table->string('pet_name');
            $table->string('medical_file');
            $table->date('date_created');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('med_records');
    }
}
