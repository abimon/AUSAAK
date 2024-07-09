<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AKTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'amount',
        'user_id',
        'type',
        'treasurer_id',
        'receipt',
        "created_at",
        "updated_at"
    ];
    public function giver(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function account(){
        return $this->belongsTo(AKAccount::class,'account_id','id');
    }
}
