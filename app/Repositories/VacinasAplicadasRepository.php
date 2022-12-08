<?php

namespace App\Repositories;

use App\Models\VacinasAplicadas;

class VacinasAplicadasRepository extends BaseRepository
{
    public function __construct(VacinasAplicadas $model)
    {
        parent::__construct($model);
    }
}
