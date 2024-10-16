<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descicao',
        'data_pub',
        'categoria_id',
    ];

    public function categoria(){

        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function autors(){

        return $this->belongsToMany(Autor::class, 'autorlivros'); // Relacionamento muitos-para-muitos
    }
}
