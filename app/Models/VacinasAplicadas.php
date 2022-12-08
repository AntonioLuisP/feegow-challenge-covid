<?php

namespace App\Models;

class VacinasAplicadas extends BaseModel
{
    protected $table = 'vacinas_aplicadas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'data_aplicacao',
        'funcionario_id',
        'vacina_id',
    ];

    protected $itensUpperCase = [];

    protected $searchable = [];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }

    public function vacina()
    {
        return $this->belongsTo(Vacina::class, 'vacina_id');
    }
}
