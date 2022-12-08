@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Funcionários',
        'items' => [
            'Funcionários' => null,
        ],
    ])
@stop

@section('content')
    <div class="mb-2">
        <a href="{{ route('funcionario.create') }}" class="btn btn-sm btn-primary" title="Adicionar">
            <i class="fa fa-plus text-white"></i>
            Adicionar Funcinário
        </a>
        @include('funcionario.search', ['route' => route('funcionario.index'), 'list' => $funcionarios])
    </div>
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
                                <a href="{{ route('funcionario.edit', ['funcionario' => $funcionario->id]) }}"
                                    class="btn btn-sm btn-warning" title="Editar">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" type="submit" title="Excluir"
                                    onclick="document.getElementById('formDelete{{ $funcionario->id }}').submit()">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                            <form id="formDelete{{ $funcionario->id }}"
                                action="{{ route('funcionario.destroy', ['funcionario' => $funcionario->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('utils.layout.pagination', ['items' => $funcionarios, $links])
@stop
