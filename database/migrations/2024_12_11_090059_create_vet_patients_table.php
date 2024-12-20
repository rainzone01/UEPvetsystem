<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vet_patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id')->unique();
            $table->string('name');
            $table->string('animal_type');
            $table->integer('age');
            $table->date('dob');
            $table->string('diagnosis');
            $table->string('image')->nullable();  // Nullable in case some patients don't have an image
            $table->string('breed')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('species')->nullable();
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
        Schema::dropIfExists('vet_patients');
    }
}
