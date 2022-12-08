<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Vacina;
use App\Models\VacinasAplicadas;

class HomeController extends Controller
{
    public function index()
    {
        $qtd_funcionarios = Funcionario::count();
        $qtd_vacinas = Vacina::count();
        $qtd_vacinas_aplicadas = VacinasAplicadas::count();
        $qtd_funcionarios_nao_vacinados = Funcionario::doesntHave('aplicacoes')->count();
        $aplicacoes = VacinasAplicadas::orderBy('data_aplicacao', 'desc')->take(5)->get();

        return view('home', compact('qtd_funcionarios', 'qtd_vacinas', 'qtd_vacinas_aplicadas', 'qtd_funcionarios_nao_vacinados', 'aplicacoes'));
    }
}
