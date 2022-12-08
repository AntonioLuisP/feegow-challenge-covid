@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Funcionário e suas Vacinas',
        'items' => [
            'Funcionários' => route('funcionario.index'),
            'Funcionário' => null,
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
                            Funcionário
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('funcionario.edit', ['funcionario' => $funcionario->id]) }}"
                                class="btn btn-sm btn-warning" title="Editar">
                                <i class="fa fa-pen"> </i>
                            </a>
                            <button class="btn btn-sm btn-danger" type="submit" title="Excluir"
                                onclick="document.getElementById('formDelete{{ $funcionario->id }}').submit()">
                                <i class="fa fa-trash"> </i>
                            </button>
                            <form id="formDelete{{ $funcionario->id }}"
                                action="{{ route('funcionario.destroy', ['funcionario' => $funcionario->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="mt-2">
                        <h3>
                            {{ $funcionario->nome_completo }}
                        </h3>
                    </div>
                    <div>
                        <span title="CPF">
                            <b class="text-primary">CPF: </b>
                            {{ $funcionario->cpf() }}
                        </span>
                    </div>
                    <div>
                        <span title="Comorbidade">
                            <b class="text-primary">Comorbidade: </b>
                            {{ $funcionario->comorbidade() }}
                        </span>
                    </div>
                    <div>
                        <span title="Nascido em:">
                            <i class="fa fa-calendar mr-2 text-primary"></i>
                            {{ $funcionario->data_nascimento }}
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
            <a href="{{ route('aplicacao.create', ['funcionario' => $funcionario->id]) }}"
                class="btn btn-block btn-warning " title="Atribuir vacinas ao funcionario">
                Adicionar Vacina
            </a>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($aplicacoes as $aplicacao)
                    <div class="col-sm-4">
                        @include('aplicacao.cardVacina')
                    </div>
                @empty
                    <div class="col-sm-12">Nenhuma Vacina informada</div>
                @endforelse
            </div>
        </div>
    </div>
@stop
