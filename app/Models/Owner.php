<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $table = 'owners';
    protected $fillable = [
        'security_code',
        'name',
        'address',
        'phone_no',
        'zip_code',
        'state',
        'country',
        'city',
        'email',
        'password',
        'status',
    ];


}
