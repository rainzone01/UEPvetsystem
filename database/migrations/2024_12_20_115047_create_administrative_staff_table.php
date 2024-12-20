<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativeStaffTable extends Migration
{
    public function up()
    {
        Schema::create('administrativestaff', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('role', 100);
            $table->string('phone_number', 15);
            $table->string('address', 255);
            $table->string('email_address', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('administrativestaff');
    }
}