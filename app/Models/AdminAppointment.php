<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The AdminAppointment model represents the 'appointments' table in the database.
 * It serves as an interface to interact with the database table, allowing you to 
 * easily retrieve, insert, update, and delete appointment records. This model uses 
 * Laravel's Eloquent ORM to interact with the database.
 */
class AdminAppointment extends Model
{
    // Use the HasFactory trait for model factory support, enabling easy 
    // creation of appointment records for testing and database seeding.
    use HasFactory;

    /**
     * The name of the table associated with the model.
     * This specifies the 'appointments' table in the database.
     */
    protected $table = 'appointments';

    /**
     * Indicate that the 'appointments' table does not have the default 'created_at' 
     * and 'updated_at' timestamp columns.
     * Setting this to false prevents Laravel from automatically managing timestamps.
     */
    public $timestamps = false;

    /**
     * Define the attributes that are mass assignable.
     * These attributes are allowed to be assigned in a mass assignment operation,
     * such as when creating or updating an appointment record.
     */
    protected $fillable = [
        'patient_name',   // The name of the patient making the appointment.
        'pet_type',       // The type of pet (e.g., dog, cat).
        'service_type',   // The type of service requested (e.g., checkup, grooming).
        'service_needed', // Additional details about the service requested.
        'phone_number',   // Contact phone number for the appointment.
        'appointment_date', // The scheduled date and time for the appointment.
    ];
}
