<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;  // Optional trait for email verification if required
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // Use HasFactory to enable model factory support for testing and database seeding.
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * This property defines which attributes can be mass-assigned (e.g., through forms).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',      // User's name.
        'email',     // User's email address.
        'password',  // User's hashed password.
    ];

    /**
     * The attributes that should be hidden for serialization.
     * This prevents sensitive attributes (e.g., password) from being exposed when the model is serialized to an array or JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',      // Hide the password from serialization.
        'remember_token', // Hide the remember_token from serialization.
    ];

    /**
     * Get the attributes that should be cast.
     * This is used to cast certain attributes to specific data types (e.g., datetime or hashed password).
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Cast email_verified_at to a Carbon datetime instance.
            'password' => 'hashed',           // Cast password to a hashed value (ensures it's stored as a hash).
        ];
    }
}
