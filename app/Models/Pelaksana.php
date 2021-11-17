<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaksana extends Model
{
    use HasFactory;

    protected $table = 'pelaksanas';
    public $timestamps = false;

    // protected $casts = [
    //     'price' => 'float'
    // ]; 

    protected $fillable = [
        'meet_id',
        'user_id',
        'role'
    ];
}
