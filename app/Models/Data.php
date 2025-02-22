<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $table = 'datos'; 
    protected $fillable = [
        'user_id',
        'fecha',
        'monto',
    ];
}
