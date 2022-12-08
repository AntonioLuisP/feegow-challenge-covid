<?php

namespace App\Repositories;

use App\Models\Funcionario;

class FuncionarioRepository extends BaseRepository
{
    public function __construct(Funcionario $model)
    {
        parent::__construct($model);
    }
}
