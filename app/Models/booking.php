<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $fillable = [
        "userid",
        "doctorid",
        "date",
        "time",
        "marital_status",
        "payment_status",
        "status",
        "patient_name"
    ];
    
    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i:s',
        'add_time' => 'datetime'
    ];
}
