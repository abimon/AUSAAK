<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AKEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'cover',
        'event_title',
        'user_id',
        'event_date',
        'event_time',
        'event_duration',
        'event_desc',
        'permissions'
    ];
}
