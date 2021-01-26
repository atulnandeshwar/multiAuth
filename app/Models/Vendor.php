<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'vendor';

    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'store_name','store_address','store_description','contact_number','profile_picture', 'banner_picture','phone_number'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
