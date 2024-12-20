<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    // Use HasFactory trait to enable model factory support for database seeding.
    use HasFactory;

    /**
     * Disable automatic timestamp management for this model.
     * Set to false because the 'appointments' table does not have 'created_at' and 'updated_at' columns.
     */
    public $timestamps = false;

    /**
     * Define the table associated with the model.
     * Specifies the 'appointments' table in the database.
     */
    protected $table = 'appointments';

    /**
     * Specify which attributes are mass-assignable.
     * Protects against mass-assignment vulnerabilities by only allowing the specified attributes.
     */
    protected $fillable = [
        'patient_name',   // Name of the patient making the appointment.
        'pet_type',       // Type of pet (e.g., dog, cat).
        'service_type',   // Type of service requested (e.g., checkup, grooming).
        'service_needed', // Additional details about the service needed.
        'phone_number',   // Contact phone number for the appointment.
        'appointment_date', // The scheduled date and time for the appointment.
    ];
}
