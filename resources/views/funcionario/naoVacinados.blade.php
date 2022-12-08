@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Funcionários Não Vacinados',
        'items' => [
            'Funcionários' => route('funcionario.index'),
            'Não Vacinados' => null,
        ],
    ])
@stop

@section('content')
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
                <tr>
                    <th>Nome: </th>
                    <th>CPF: </th>
                    <th>Tem Comorbidade: </th>
                    <th>Nascido em: </th>
                    <th style="width: 50px; text-align: center;">Ações</th>
                </tr>
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->nome_completo }} </td>
                        <td>{{ $funcionario->cpf() }} </td>
                        <td>{{ $funcionario->comorbidade() }} </td>
                        <td>{{ $funcionario->data_nascimento }} </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('funcionario.show', ['funcionario' => $funcionario->id]) }}"
                                    class="btn btn-sm btn-info" title="Ver">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
