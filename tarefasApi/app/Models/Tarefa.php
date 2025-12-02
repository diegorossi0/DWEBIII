<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'prioridade',
        'status',
        'inicio',
        'fim'
    ];

    public function categorias(){
        return $this->hasManyThrough(Categoria::class, 
            TarefaCategoria::class, 'idtarefa', 'idcategoria', 
            'idtarefa', 'idcategoria');
    }

    protected $table = 'tarefas';
    protected $primaryKey = 'idtarefa';
}
