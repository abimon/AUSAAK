<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'purchase_year',
        'purchase_price',
        'condition',
        'receipt',
        'image',
        'logged_by'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'logged_by', 'id');
    }
}
