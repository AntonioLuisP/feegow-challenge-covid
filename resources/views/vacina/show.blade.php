@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Vacina e Funcionários Vacinados',
        'items' => [
            'Vacinas' => route('vacina.index'),
            'Vacina' => null,
        ],
    ])
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header pb-0 border-bottom-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="card-title text-muted">
                            Vacina
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('vacina.edit', ['vacina' => $vacina->id]) }}" class="btn btn-sm btn-warning"
                                title="Editar">
                                <i class="fa fa-pen"> </i>
                            </a>
                            <button class="btn btn-sm btn-danger" type="submit" title="Excluir"
                                onclick="document.getElementById('formDelete{{ $vacina->id }}').submit()">
                                <i class="fa fa-trash"> </i>
                            </button>
                            <form id="formDelete{{ $vacina->id }}"
                                action="{{ route('vacina.destroy', ['vacina' => $vacina->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="mt-2">
                        <h3>
                            {{ $vacina->nome }}
                        </h3>
                    </div>
                    <div>
                        <span title="Lote">
                            <b class="text-primary">Lote: </b>
                            {{ $vacina->lote }}
                        </span>
                    </div>
                    <div>
                        <span title="Validade em:">
                            <i class="fa fa-calendar mr-2 text-primary"></i>
                            {{ $vacina->data_validade }}
                        </span>
                    </div>
                    <div>
                        <span title="Aplicações">
                            <b class="text-primary">Aplicações: </b>
                            {{ $aplicacoes->count() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($aplicacoes as $aplicacao)
                    <div class="col-sm-4">
                        @include('aplicacao.cardFuncionario')
                    </div>
                @empty
                    <div class="col-sm-12">Nenhum Funcionário Vacinado para esta Vacina</div>
                @endforelse
            </div>
        </div>
    </div>
@stop
