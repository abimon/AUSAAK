<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AKLeader extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role_id',
        'from',
        'to',
    ] ;
    function role(){
        return $this->belongsTo(AKRole::class,'role_id','id');
    }
    function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
