<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'county',
        'description',
        'year',
        'cover',
        'isOngoing',
        'isClosed',
        'report',
    ];
    public function photos(){
        return $this->hasMany(MissionFile::class,'mission_id','id');
    }
}
