<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AView extends Model
{
    use HasFactory;
    protected $fillable = [
        'user-ip',
        'post_id',
    ];
}
