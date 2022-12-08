<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Vacina;

class HomeController extends Controller
{
    public function index()
    {
        $qtd_funcionarios = Funcionario::count();
        $qtd_vacinas = Vacina::count();
        $qtd_funcionarios_vacinados = Funcionario::count();
        $qtd_funcionarios_nao_vacinados = Funcionario::count();
        $vacinas = Vacina::all();

        return view('home', compact('qtd_funcionarios', 'qtd_vacinas', 'qtd_funcionarios_vacinados', 'qtd_funcionarios_nao_vacinados', 'vacinas'));
    }
}
