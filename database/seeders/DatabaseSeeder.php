<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use App\Models\Vacina;
use App\Models\VacinasAplicadas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $funcionario = Funcionario::create([
            'nome_completo' => 'Antônio Luís',
            'cpf' => '29490949027',
            'data_nascimento' => '1998-12-13',
            'tem_comorbidade' => true
        ]);

        Funcionario::create([
            'nome_completo' => 'Antônio Luís Pereira',
            'cpf' => '44890415009',
            'data_nascimento' => '1997-12-13',
            'tem_comorbidade' => false
        ]);

        Funcionario::create([
            'nome_completo' => 'Antônio Luís Pereira Júnior',
            'cpf' => '56437808012',
            'data_nascimento' => '1996-12-13',
            'tem_comorbidade' => true
        ]);

        $vacina1 = Vacina::create([
            'nome' => 'Coronavac',
            'lote' => '210150 - COVID-19 SINOVAC',
            'data_validade' => '2022-12-13',
        ]);

        $vacina2 = Vacina::create([
            'nome' => 'ASTRAZENECA',
            'lote' => '213VCD022W - COVID-19 ASTRAZENECA',
            'data_validade' => '2021-12-13',
        ]);

        $vacina3 = Vacina::create([
            'nome' => 'Coronavac',
            'lote' => '213VCD022W - COVID-19 Coronavac',
            'data_validade' => '2020-12-13',
        ]);

        VacinasAplicadas::create([
            'funcionario_id' => $funcionario->id,
            'vacina_id' => $vacina1->id,
            'data_aplicacao' => '2022-06-03'
        ]);

        VacinasAplicadas::create([
            'funcionario_id' => $funcionario->id,
            'vacina_id' => $vacina2->id,
            'data_aplicacao' => '2022-03-03'
        ]);

        VacinasAplicadas::create([
            'funcionario_id' => $funcionario->id,
            'vacina_id' => $vacina3->id,
            'data_aplicacao' => '2022-11-03'
        ]);

    }
}
