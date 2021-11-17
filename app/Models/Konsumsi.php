<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumsi extends Model
{
    use HasFactory;
    protected $table = 'konsumsi';
    public $timestamps = false;

    // protected $casts = [
    //     'price' => 'float'
    // ]; 

    protected $fillable = [
        'meet_id',
        'nama',
        'jumlah',
        'harga'
    ];
}
