<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receveur extends Model
{
    use HasFactory;
    protected $table = 'receveurs';
    protected $fillable =
   [
        'user_id',
        'state',
        'money',
        'point',
   ];
   public function user()
   {
    return $this->belongsTo(User::class, 'user_id','id');
   }
}
