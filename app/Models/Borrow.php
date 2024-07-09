<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $fillable =[
        'item_id',
        'borrower_name',
        'borrower_contact',
        'ausaa_guarantor',
        'borrowing_date',
        'return_date',
        'details',
        'logged_by',
        'isReturned'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'logged_by', 'id');
    }
    public function item(){
        return $this->belongsTo(Inventory::class, 'item_id', 'id');
    }
}
