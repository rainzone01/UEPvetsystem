<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VetPatient extends Model
{
    // Use HasFactory trait to enable model factory support for database seeding.
    use HasFactory;

    /**
     * Define the table associated with the model.
     * This is optional if the table name follows Laravel's naming convention, but it is explicitly set here as 'vet_patients'.
     */
    protected $table = 'vet_patients';

    /**
     * The attributes that are mass assignable.
     * These are the attributes that can be mass-assigned, meaning they can be populated in a bulk operation such as a form submission.
     */
    protected $fillable = [
        'patient_id',      // Unique identifier for the patient (e.g., pet's medical record ID).
        'name',            // Name of the patient (pet).
        'animal_type',     // Type of animal (e.g., dog, cat).
        'age',             // Age of the patient.
        'dob',             // Date of birth of the patient.
        'diagnosis',       // Medical diagnosis of the patient.
        'image',           // Image of the patient (e.g., photo).
        'breed',           // Breed of the animal.
        'contact_number',  // Contact number of the pet's owner.
        'owner_name',      // Name of the pet's owner.
        'species',         // Species of the patient (e.g., Canine, Feline).
    ];

    /**
     * Timestamps are enabled by default.
     * This property controls whether Laravel automatically manages 'created_at' and 'updated_at' timestamps.
     * This can be omitted if you want the default behavior, but it is explicitly set here for clarity.
     */
    public $timestamps = true;  // By default, Laravel expects 'created_at' and 'updated_at' columns in the database.
}
