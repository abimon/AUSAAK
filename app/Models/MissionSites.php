<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionSites extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_id',
        'site',
        'member_id',
        'role',
        'confirmed',
    ];
}
