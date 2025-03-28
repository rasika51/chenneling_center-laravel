<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
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

    ] ;
    public $timestamps = false; // This line will disable the automatic timestamp columns
}
