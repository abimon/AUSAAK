<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id',
       'department',
       'title',
       'slug',
       'details',
       'isPublic'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
