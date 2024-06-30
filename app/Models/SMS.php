<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'recepients',
        'type',
        'subject',
        'sender_id'
    ];
    function sender(){
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
}
