<div class="card">
    <div class="card-header pb-0 border-bottom-0">
        <div class="d-flex align-items-center justify-content-between">
            <h3 class="card-title text-muted">
                Vacina
            </h3>
            <div class="card-tools">
                <a href="{{ route('vacina.show', ['vacina' => $aplicacao->vacina_id]) }}" class="btn btn-sm btn-info"
                    title="Ver Vacina">
                    <i class="fa fa-search"></i>
                </a>
                <a href="{{ route('aplicacao.edit', ['aplicacao' => $aplicacao->id]) }}" class="btn btn-sm btn-warning"
                    title="Editar Aplicação">
                    <i class="fa fa-pen"> </i>
                </a>
                <button class="btn btn-sm btn-danger" type="submit" title="Excluir Aplicação"
                    onclick="document.getElementById('formDelete{{ $aplicacao->id }}').submit()">
                    <i class="fa fa-trash"> </i>
                </button>
                <form id="formDelete{{ $aplicacao->id }}"
                    action="{{ route('aplicacao.destroy', ['aplicacao' => $aplicacao->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="mt-2">
            <h3>
                {{ $aplicacao->vacina->nome }}
            </h3>
        </div>
        <div>
            <span title="Lote">
                <b class="text-primary">Lote: </b>
                {{ $aplicacao->vacina->lote }}
            </span>
        </div>
        <div>
            <span title="Validade em:">
                <b class="text-primary">Aplicação: </b>
                {{ $aplicacao->data_aplicacao }}
            </span>
        </div>
    </div>
</div>
