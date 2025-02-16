<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tarefas';

    protected $fillable = [
        'usuario_id',
        'responsavel_id',
        'status_id',
        'titulo',
        'descricao',
        'prazo',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function responsavel()
    {
        return $this->belongsTo(Usuario::class, 'responsavel_id');
    }

    public function status()
    {
        return $this->belongsTo(Statu::class, 'status_id');
    }
}
