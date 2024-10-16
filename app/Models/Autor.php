<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nacionalidade',
        'biografia',
        'data_nasc',
    ];

    public function livros(){

        return $this->belongsToMany(Livro::class, 'autorlivros'); // Relacionamento muitos-para-muitos
    }
}
