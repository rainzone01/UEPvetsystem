<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    // Use HasFactory trait to enable model factory support for database seeding.
    use HasFactory;

    /**
     * Disable automatic timestamp management for this model.
     * Set to false because the 'invoice' table does not have 'created_at' and 'updated_at' columns.
     */
    public $timestamps = false;

    /**
     * Define the table associated with the model.
     * Specifies the 'invoice' table in the database.
     */
    protected $table = 'invoice'; // Specify the table name if it's different from the default

    /**
     * Specify which attributes are mass-assignable.
     * Protects against mass-assignment vulnerabilities by only allowing the specified attributes.
     */
    protected $fillable = [
        'owner_name',           // Name of the pet owner.
        'contact_number',       // Contact number of the pet owner.
        'email',                // Email address of the pet owner.
        'patient_id',           // Unique ID for the patient (pet).
        'pet_name',             // Name of the pet.
        'breed',                // Breed of the pet.
        'service_date',         // Date of the service provided.
        'service_description',  // Description of the service provided.
        'cost_per_service',     // Cost per individual service.
        'quantity',             // Quantity of services or items.
        'medication_name',      // Name of the medication prescribed.
        'unit_cost',            // Cost per unit of medication.
        'medication_quantity',  // Quantity of medication prescribed.
        'payment_status',       // Status of the payment (e.g., paid, pending).
    ];
}
