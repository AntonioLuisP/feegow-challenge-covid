<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Models\VacinasAplicadas;
use App\Models\Funcionario;
use App\Repositories\FuncionarioRepository;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    const ITEM = 'funcionario';
    const ITEMS_PER_SEARCH = 25;

    protected $repository;

    public function __construct(
        FuncionarioRepository $repository,
    ) {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $funcionarios = $this->repository->bigSearch($request->all(), false)->paginate(intval($request->quantidade) > 0 ? intval($request->quantidade) : $this::ITEMS_PER_SEARCH);
        $links = $funcionarios->appends($request->except('page'));
        return view($this::ITEM . '.index', ['funcionarios' => $funcionarios, 'links' => $links]);
    }

    public function naoVacinados(Request $request)
    {
        $funcionarios = Funcionario::doesntHave('aplicacoes')->get();
        return view($this::ITEM . '.naoVacinados', ['funcionarios' => $funcionarios]);
    }

    public function show(Funcionario $funcionario)
    {
        $aplicacoes = VacinasAplicadas::with('vacina')->where('funcionario_id', $funcionario->id)->orderBy('data_aplicacao', 'desc')->get();
        return view($this::ITEM . '.show', compact('funcionario', 'aplicacoes'));
    }

    public function create()
    {
        return view($this::ITEM . '.create');
    }

    public function store(FuncionarioRequest $request)
    {
        $funcionario = $this->repository->create($request->validated());
        return redirect()->route($this::ITEM . '.show', ['funcionario' => $funcionario]);
    }

    public function edit(Funcionario $funcionario)
    {
        return view($this::ITEM . '.edit', compact('funcionario'));
    }

    public function update(Funcionario $funcionario, FuncionarioRequest $request)
    {
        $this->repository->update($request->validated(), $funcionario->id);
        return redirect()->route($this::ITEM . '.show', ['funcionario' => $funcionario]);
    }

    public function destroy(Funcionario $funcionario)
    {
        $this->repository->delete($funcionario->id);
        return redirect()->route($this::ITEM . '.index');
    }
}
