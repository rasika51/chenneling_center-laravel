<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'doctor';

    protected $fillable = [
        "Full_name",
        "email",
        "Gender",
        "contact_no",
        "Specilization",
        "password",
        "ChangingDate",
        "ChangingTime",
        "Fees"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
