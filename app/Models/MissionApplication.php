<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "email",
        "contact",
        "church",
        "district",
        "field",
        "county",
        "subcounty",
        "area",
        "year",
        "projects",
        "baptisms",
        "retentions",
        "dominant_church",
        "other_churches",
        "economic",
        "social",
        "needs",
        "transport",
        "condition",
        "water",
        "floods",
        "w_source",
        "security",
        "chief",
        "electricity",
        "energy",
        "accommodation",
        "hostel",
        "confirm",
        'isPicked'
    ];
}
