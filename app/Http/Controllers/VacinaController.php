<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacinaRequest;
use App\Models\Vacina;
use App\Models\VacinasAplicadas;
use App\Repositories\VacinaRepository;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    const ITEM = 'vacina';
    const ITEMS_PER_SEARCH = 25;

    protected $repository;

    public function __construct(
        VacinaRepository $repository,
    ) {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $vacinas = $this->repository->bigSearch($request->all(), false)->paginate(intval($request->quantidade) > 0 ? intval($request->quantidade) : $this::ITEMS_PER_SEARCH);
        $links = $vacinas->appends($request->except('page'));
        return view($this::ITEM . '.index', ['vacinas' => $vacinas, 'links' => $links]);
    }

    public function show(Vacina $vacina)
    {
        $aplicacoes = VacinasAplicadas::with('vacina')->where('vacina_id', $vacina->id)->orderBy('data_aplicacao', 'desc')->get();
        return view($this::ITEM . '.show', compact('vacina', 'aplicacoes'));
    }

    public function create()
    {
        return view($this::ITEM . '.create');
    }

    public function store(VacinaRequest $request)
    {
        $vacina = $this->repository->create($request->validated());
        return redirect()->route($this::ITEM . '.show', ['vacina' => $vacina]);
    }

    public function edit(Vacina $vacina)
    {
        return view($this::ITEM . '.edit', compact('vacina'));
    }

    public function update(Vacina $vacina, VacinaRequest $request)
    {
        $this->repository->update($request->validated(), $vacina->id);
        return redirect()->route($this::ITEM . '.show', ['vacina' => $vacina]);
    }

    public function destroy(Vacina $vacina)
    {
        $this->repository->delete($vacina->id);
        return redirect()->route($this::ITEM . '.index');
    }
}
