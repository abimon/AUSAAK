<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AKArticle extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category',
        'title',
        'date',
        'text',
        'body',
        'isPublished'
    ];
    public function author(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function comments()
    {
        return $this->hasMany(Acomment::class, 'post_id', 'id');
    }
    public function likes(){
        return $this->hasMany(Like::class, 'post_id', 'id');
    }
    public function views(){
        return $this->hasMany(AView::class, 'post_id', 'id');
    }
}
