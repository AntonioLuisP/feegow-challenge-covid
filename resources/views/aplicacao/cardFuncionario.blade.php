<div class="card">
    <div class="card-header pb-0 border-bottom-0">
        <div class="d-flex align-items-center justify-content-between">
            <h3 class="card-title text-muted">
                Funcionário
            </h3>
            <div class="card-tools">
                <a href="{{ route('funcionario.show', ['funcionario' => $aplicacao->funcionario_id]) }}"
                    class="btn btn-sm btn-info" title="Ver Funcionário">
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
                {{ $aplicacao->funcionario->nome_completo }}
            </h3>
        </div>
        <div>
            <span title="CPF">
                <b class="text-primary">CPF: </b>
                {{ $aplicacao->funcionario->cpf() }}
            </span>
        </div>
        <div>
            <span title="Comorbidade">
                <b class="text-primary">Comorbidade: </b>
                {{ $aplicacao->funcionario->comorbidade() }}
            </span>
        </div>
        <div>
            <span title="Nascido em:">
                <i class="fa fa-calendar mr-2 text-primary"></i>
                {{ $aplicacao->funcionario->data_nascimento }}
            </span>
        </div>
    </div>
</div>
