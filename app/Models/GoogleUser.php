<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleUser extends Model
{
    use HasFactory;
    protected $table = 'google_users';
    protected $fillable = [
        'name',
        'email',
        'google_id',
        'avatar',
        'country',
        'city',
        'phone_number',
        'state',
    ];
}
