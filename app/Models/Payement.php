<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    use HasFactory;

    protected $table = 'payements';
    protected $fillable = [
    'user_id',
    'name_card',
    'num_card',
    'date_card',
    'cvv',
    ];
}
