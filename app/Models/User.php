<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'email',
        'contact',
        'current_residence',
        'profile',
        'gender',
        'chapter',
        'grad_year',
        'password',
        'role',
        'inst'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected function messages(){
        return $this->hasMany(AKChat::class, 'recepient_id', 'id');
    }
    protected function notifications(){
        return $this->hasMany(AKNotification::class, 'recepient_id', 'id');
    }
    protected function office()
    {
        return $this->belongsTo(AKRole::class, 'role', 'title');
    }
}
