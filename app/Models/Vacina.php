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

    public function funcionarios()
    {
        return $this->belongsToMany(ModelsFuncionario::class, 'funcionarios_vacinas', 'vacina_id', 'funcionairo_id')->withPivot('data_aplicacao');
    }
}
