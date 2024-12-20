<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    // Use HasFactory trait to enable model factory support for database seeding.
    use HasFactory;

    /**
     * Disable automatic timestamp management for this model.
     * Set to false because the 'applications' table does not have 'created_at' and 'updated_at' columns.
     */
    public $timestamps = false;

    /**
     * Define the table associated with the model.
     * Specifies the 'applications' table in the database.
     */
    protected $table = 'applications'; 

    /**
     * Specify which attributes are mass-assignable.
     * Protects against mass-assignment vulnerabilities by only allowing the specified attributes.
     */
    protected $fillable = [
        'job_role',   // The job role being applied for.
        'name',       // Applicant's name.
        'phone',      // Applicant's phone number.
        'date',       // The date of the application.
        'resume',     // Applicant's resume (can be a file path or link).
    ];
}
