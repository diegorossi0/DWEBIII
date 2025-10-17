<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarefaCategoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'idtarefa',
        'idcategoria'
    ];

    protected $table = 'tarefa_categorias';
    protected $primaryKey = ['idcategoria', 'idtarefa'];
}
