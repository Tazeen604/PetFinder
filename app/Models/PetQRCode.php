<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetQRCode extends Model
{
    use HasFactory;
    protected $table = 'pet_qr_code';
    protected $fillable = [
        'security_code',
        'qr_code_url',
    ];
}
