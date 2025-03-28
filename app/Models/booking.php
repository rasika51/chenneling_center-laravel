<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $fillable = [
        "userid",
        "doctorid",
        "date",
        "time",
        "checKout",
        "payment",
        "marital_status",
        "payment_status",
        "status",
        "patient_name"

    ] ;
    public $timestamps = false;
}
