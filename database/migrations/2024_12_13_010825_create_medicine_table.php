<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('medicine', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('quantity');
        $table->string('unit');
        $table->string('dosage');
        $table->string('type');
        $table->string('prescription');
        $table->string('medication');
        $table->date('expiration_date');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine');
    }
};
