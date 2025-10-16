<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'patients';
    
    protected $fillable = [
        "full_name",
        "email",
        "gender",
        "dob",
        "contact_no",
        "address",
        "marital_status",
        "allergic_medicine",
        "password"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
