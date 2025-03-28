<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $table = 'doctor_speclist';
    protected $fillable = [
        "userid",
        "doctorid",
        "date",
        "time",
        "marital_status",
        "payment_status",
        "status",
        "patient_name"

    ] ;
    public $timestamps = false;
}
