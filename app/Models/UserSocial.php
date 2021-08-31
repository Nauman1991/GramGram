<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{
    use HasFactory;
    protected $table='user_social';
    protected $gaurded=[];

    protected $fillable = [
        'uid',
        'email',
        'phone',
        'is_active',
        'social_link',
        'provider',
        'custom_email'
    ];
}
