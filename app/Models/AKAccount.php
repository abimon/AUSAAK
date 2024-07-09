<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AKAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        's_target',
        'a_target',
        'g_target',
        'isOngoing',
        "created_at",
        "updated_at"
    ];
    public function transactions()
    {
        return $this->hasMany(AKTransaction::class, 'account_id', 'id');
    }
    public function expenses()
    {
        return $this->hasMany(AKExpense::class, 'account_id', 'id');
    }
}
