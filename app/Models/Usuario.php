<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $fillable = [
        'nome', 'email', 'senha', 'remember_token'
    ];

    protected $hidden = [
        'senha', 'remember_token',
    ];

    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'usuario_id');
    }

    public function tarefasResponsavel()
    {
        return $this->hasMany(Tarefa::class, 'responsavel_id');
    }
}
