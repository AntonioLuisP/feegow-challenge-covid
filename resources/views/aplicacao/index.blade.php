@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Vacinas Aplicadas',
        'items' => [
            'Vacinas' => route('vacina.index'),
            'Aplicações' => null,
        ],
    ])
@stop

@section('content')
    <div class="mb-2">
        @include('aplicacao.search', ['route' => route('aplicacao.index'), 'list' => $aplicacoes])
    </div>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
                <tr>
                    <th>Funcionario:</th>
                    <th>Vacina / Lote:</th>
                    <th style="width: 160px">Aplicado em:</th>
                    <th style="width: 50px; text-align: center;">Ações</th>
                </tr>
                @foreach ($aplicacoes as $aplicacao)
                    <tr>
                        <td>{{ $aplicacao->funcionario->nome_completo }} </td>
                        <td>{{ $aplicacao->vacina->nome }} / {{ $aplicacao->vacina->lote }} </td>
                        <td>{{ $aplicacao->data_aplicacao }} </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('funcionario.show', ['funcionario' => $aplicacao->funcionario_id]) }}"
                                    class="btn btn-sm btn-info" title="Ver">
                                    Funcionário
                                </a>
                                <a href="{{ route('vacina.show', ['vacina' => $aplicacao->vacina_id]) }}"
                                    class="btn btn-sm btn-warning" title="Ver">
                                    Vacina
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('utils.layout.pagination', ['items' => $aplicacoes, $links])
@stop
