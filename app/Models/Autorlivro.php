<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorlivro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'biografia',
        'data_nasc',
    ];
}
