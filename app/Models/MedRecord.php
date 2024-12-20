<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedRecord extends Model
{
    // Use HasFactory trait to enable model factory support for database seeding.
    use HasFactory;

    /**
     * Define custom names for the 'created_at' and 'updated_at' columns.
     * This allows you to use custom timestamps in the model, such as 'date_created' for 'created_at'.
     */
    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'updated_at';

    /**
     * Enable timestamp management for this model.
     * By setting this to true, Laravel will automatically handle 'created_at' and 'updated_at' columns.
     */
    public $timestamps = true;

    /**
     * Set the primary key for the model.
     * By default, Eloquent assumes the primary key is 'id', but we use 'record_id'.
     */
    protected $primaryKey = 'record_id';

    /**
     * Specify which attributes are mass-assignable.
     * These attributes are allowed to be assigned in a mass assignment operation.
     */
    protected $fillable = [
        'patient_id',     // Unique identifier for the patient.
        'owner_name',     // Name of the pet owner.
        'pet_name',       // Name of the pet.
        'medical_file',   // Medical file or record associated with the pet.
        'date_created',   // The date the record was created.
    ];
}
