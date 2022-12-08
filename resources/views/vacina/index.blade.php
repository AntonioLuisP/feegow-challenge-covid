@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Vacinas',
        'items' => [
            'Vacinas' => null,
        ],
    ])
@stop

@section('content')
    <div class="mb-2">
        <a href="{{ route('vacina.create') }}" class="btn btn-sm btn-primary" title="Adicionar">
            <i class="fa fa-plus text-white"></i>
            Adicionar Vacina
        </a>
        @include('vacina.search', ['route' => route('vacina.index'), 'list' => $vacinas])
    </div>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
                <tr>
                    <th>Nome: </th>
                    <th>Lote: </th>
                    <th>Validade: </th>
                    <th style="width: 50px; text-align: center;">Ações</th>
                </tr>
                @foreach ($vacinas as $vacina)
                    <tr>
                        <td>{{ $vacina->nome }} </td>
                        <td>{{ $vacina->lote }} </td>
                        <td>{{ $vacina->data_validade }} </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('vacina.show', ['vacina' => $vacina->id]) }}" class="btn btn-sm btn-info"
                                    title="Ver">
                                    <i class="fa fa-search"></i>
                                </a>
                                <a href="{{ route('vacina.edit', ['vacina' => $vacina->id]) }}"
                                    class="btn btn-sm btn-warning" title="Editar">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" type="submit" title="Excluir"
                                    onclick="document.getElementById('formDelete{{ $vacina->id }}').submit()">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                            <form id="formDelete{{ $vacina->id }}"
                                action="{{ route('vacina.destroy', ['vacina' => $vacina->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('utils.layout.pagination', ['items' => $vacinas, $links])
@stop
