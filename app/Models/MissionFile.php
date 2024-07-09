<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionFile extends Model
{
    use HasFactory;
    protected $fillable = [
        "mission_id",
        "path",
        "user_id",
    ];
}
