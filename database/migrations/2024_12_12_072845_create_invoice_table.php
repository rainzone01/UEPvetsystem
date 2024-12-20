<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id(); 
            $table->string('owner_name');
            $table->string('contact_number');
            $table->string('email')->nullable(); 
            $table->string('patient_id');
            $table->string('pet_name');
            $table->string('breed');
            $table->date('service_date');
            $table->text('service_description');
            $table->decimal('cost_per_service', 8, 2); 
            $table->integer('quantity'); 
            $table->string('medication_name')->nullable(); 
            $table->decimal('unit_cost', 8, 2)->nullable(); 
            $table->integer('medication_quantity')->nullable(); 
            $table->string('payment_status');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
