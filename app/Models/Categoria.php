<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function livros()
    {
        return $this->hasMany(Livro::class, 'categoria_id'); // Relação reversa
    }
}
