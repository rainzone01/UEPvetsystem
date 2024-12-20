<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrator extends Authenticatable
{
    // Use HasFactory trait to enable model factory support for database seeding.
    use HasFactory;

    /**
     * Define the table associated with the model.
     * Specifies the 'administrators' table in the database.
     */
    protected $table = 'administrators';  // Changed to plural

    /**
     * Set the primary key of the table.
     * By default, Eloquent assumes the primary key is 'id', but we use 'user_id'.
     */
    protected $primaryKey = 'user_id';

    /**
     * Disable timestamps for this model.
     * Set to false if the table does not have 'created_at' and 'updated_at' columns.
     */
    public $timestamps = false;

    /**
     * Specify which attributes are mass-assignable.
     * This protects against mass-assignment vulnerabilities.
     */
    protected $fillable = [
        'username',  // Administrator's username.
        'password',  // Administrator's password (hashed).
    ];
}
