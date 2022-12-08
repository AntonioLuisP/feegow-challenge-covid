<?php

namespace App\Models;

class Vacina extends BaseModel
{
    protected $table = 'vacinas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'lote',
        'data_validade',
    ];

    protected $itensUpperCase = [];

    protected $searchable = [
        'nome' => 'like',
        'lote' => 'like',
    ];

    public function aplicacoes()
    {
        return $this->hasMany(VacinasAplicadas::class, 'funcionario_id', 'id');
    }

    public function funcionarios()
    {
        return $this->belongsToMany(Funcionario::class, 'vacinas_aplicadas', 'vacina_id', 'funcionairo_id')->withPivot('data_aplicacao');
    }
}
