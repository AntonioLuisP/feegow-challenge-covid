<?php

namespace App\Repositories;

use App\Models\Vacina;

class VacinaRepository extends BaseRepository
{
    public function __construct(Vacina $model)
    {
        parent::__construct($model);
    }
}
