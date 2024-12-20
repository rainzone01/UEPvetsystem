<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    // Use HasFactory trait to enable model factory support for database seeding.
    use HasFactory;

    /**
     * Disable automatic timestamp management for this model.
     * Set to false because the 'resources' table does not have 'created_at' and 'updated_at' columns.
     */
    public $timestamps = false; 

    /**
     * Define the table associated with the model.
     * Specifies the 'resources' table in the database.
     */
    protected $table = 'resources';  

    /**
     * Specify which attributes are mass-assignable.
     * Protects against mass-assignment vulnerabilities by only allowing the specified attributes.
     */
    protected $fillable = [
        'name',            // Name of the resource.
        'quantity',        // Quantity of the resource available.
        'unit',            // Unit of measurement for the resource (e.g., kg, liters).
        'prescription',    // Prescription status or details for the resource.
        'expiration_date', // Expiration date of the resource.
    ];

    /**
     * Specify the attributes that should be treated as dates.
     * Ensures that the 'created_at' and 'expiration_date' fields are cast to Carbon instances for easier date manipulation.
     */
    protected $dates = ['created_at', 'expiration_date'];
}
