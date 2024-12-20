<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    // Use HasFactory trait to enable model factory support for database seeding.
    use HasFactory;

    /**
     * Disable automatic timestamp management for this model.
     * Set to false because the 'medicine' table does not have 'created_at' and 'updated_at' columns.
     */
    public $timestamps = false; 

    /**
     * Define the table associated with the model.
     * Specifies the 'medicine' table in the database.
     */
    protected $table = 'medicine'; 

    /**
     * Specify which attributes are mass-assignable.
     * Protects against mass-assignment vulnerabilities by only allowing the specified attributes.
     */
    protected $fillable = [
        'name',             // Name of the medicine.
        'quantity',         // Quantity of the medicine available.
        'unit',             // Unit of measurement for the medicine (e.g., mg, ml).
        'dosage',           // Dosage information for the medicine.
        'type',             // Type of the medicine (e.g., tablet, syrup).
        'prescription',     // Prescription status of the medicine.
        'medication',       // Medication details, possibly description or instructions.
        'expiration_date',  // Expiration date of the medicine.
    ];

    /**
     * Specify the attributes that should be treated as dates.
     * Ensures that the 'created_at' and 'expiration_date' fields are cast to Carbon instances for date manipulation.
     */
    protected $dates = ['created_at', 'expiration_date'];
}
