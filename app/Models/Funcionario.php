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
        'tem_comorbidade',
    ];

    protected $itensUpperCase = [];

    protected $searchable = [
        'nome_completo' => 'like',
        'cpf' => 'like',
    ];

    protected $casts = [
        'tem_comorbidade' => 'boolean',
    ];

    public function cpf()
    {
        return substr($this->cpf, 0, 5) . '...';
    }

    public function comorbidade()
    {
        return $this->tem_comorbidade ? 'Sim' : 'Não';
    }

    public function aplicacoes()
    {
        return $this->hasMany(VacinasAplicadas::class, 'funcionario_id', 'id');
    }

    public function vacinas()
    {
        return $this->belongsToMany(Vacina::class, 'vacinas_aplicadas', 'funcionario_id', 'vacina_id')->withPivot('data_aplicacao');
    }
}
