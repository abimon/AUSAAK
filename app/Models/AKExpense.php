<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AKExpense extends Model
{
    use HasFactory;
    protected $fillable = [
        "account_id",
        "purpose",
        "treasurer_id",
        "recepient",
        "amount",
        "created_at",
        "updated_at"
        ];
        function treasurer(){
            return $this->belongsTo(User::class,"treasurer_id","id");
        }
        function account(){
            return $this->belongsTo(AKAccount::class,"account_id","id");
        }
}
