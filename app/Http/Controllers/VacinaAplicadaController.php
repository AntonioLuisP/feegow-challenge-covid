<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacinaAplicacaoRequest;
use App\Models\VacinasAplicadas;
use App\Models\Funcionario;
use App\Models\Vacina;
use App\Repositories\VacinasAplicadasRepository;
use Illuminate\Http\Request;

class VacinaAplicadaController extends Controller
{
    const ITEM = 'aplicacao';
    const ITEMS_PER_SEARCH = 25;

    protected $repository;

    public function __construct(
        VacinasAplicadasRepository $repository,
    ) {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $aplicacoes = $this->repository->bigSearch(['field' => 'data_aplicacao', 'sort' => 'desc'],  false, ['funcionario', 'vacina'])->paginate(intval($request->quantidade) > 0 ? intval($request->quantidade) : $this::ITEMS_PER_SEARCH);
        $links = $aplicacoes->appends($request->except('page'));
        return view($this::ITEM . '.index', ['aplicacoes' => $aplicacoes, 'links' => $links]);
    }

    public function create(Funcionario $funcionario)
    {
        $vacinas = Vacina::all();
        return view($this::ITEM . '.create', compact('funcionario', 'vacinas'));
    }

    public function store(Funcionario $funcionario, VacinaAplicacaoRequest $request)
    {
        $aplicacao = $this->repository->create($request->validated() + ['funcionario_id' => $funcionario->id]);
        return redirect()->route('funcionario.show', ['funcionario' => $aplicacao->funcionario_id]);
    }

    public function edit(VacinasAplicadas $aplicacao)
    {
        $vacinas = Vacina::all();
        return view($this::ITEM . '.edit', compact('aplicacao', 'vacinas'));
    }

    public function update(VacinasAplicadas $aplicacao, VacinaAplicacaoRequest $request)
    {
        $this->repository->update($request->validated(), $aplicacao->id);
        return redirect()->route('funcionario.show', ['funcionario' => $aplicacao->funcionario_id]);
    }

    public function destroy(VacinasAplicadas $aplicacao)
    {
        $aplicacao->funcionario_id;
        $this->repository->delete($aplicacao->id);
        return redirect()->back();
    }
}
