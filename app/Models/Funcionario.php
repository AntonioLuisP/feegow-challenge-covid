<?php

namespace App\Models;

class Funcionario extends BaseModel
{
    protected $table = 'funcionarios';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome_completo',
        'cpf',
        'data_nascimento',
    ];

    protected $itensUpperCase = [];

    protected $searchable = [
        'nome_completo' => 'like',
        'cpf' => 'like',
    ];

    public function cpf()
    {
        return substr($this->cpf, 0, 5) . '...';
    }

    public function vacinas()
    {
        return $this->belongsToMany(Vacina::class, 'funcionarios_vacinas', 'id_funcionario', 'id_vacina')->withPivot('data_aplicacao');
    }
}
