<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Models\Curso;
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

    public function show(Funcionario $funcionario)
    {
        // $vacinas = $funcionario->vacinas()->orderBy('nome', 'asc')->get();
        return view($this::ITEM . '.show', compact('funcionario'));
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

    // public function vacinas(Funcionario $funcionario)
    // {
    //     $vacinas = Curso::select('id', 'nome')
    //         ->withCount(['funcionarios' => function ($query) use ($funcionario) {
    //             $query->where('funcionarios.id', $funcionario->id);
    //         }])
    //         ->orderBy('nome', 'asc')
    //         ->get();
    //     return view($this::ITEM . '.atribuirvacinas', compact('funcionario', 'vacinas'));
    // }

    // public function updatevacinas(Funcionario $funcionario, Request $request)
    // {
    //     $validated = $request->validate([
    //         'vacinas' => ['nullable', 'array', 'exists:vacinas,id'],
    //     ]);

    //     $funcionario->vacinas()->sync($validated['vacinas'] ?? []);

    //     return redirect()->route($this::ITEM . '.show', ['funcionario' => $funcionario]);
    // }

    public function destroy(Funcionario $funcionario)
    {
        $this->repository->delete($funcionario->id);
        return redirect()->route($this::ITEM . '.index');
    }
}
