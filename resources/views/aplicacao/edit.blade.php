@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Edição de Aplicação de Vacina',
        'items' => [
            'Funcionários' => route('funcionario.index'),
            'Funcionário' => route('funcionario.show', ['funcionario' => $aplicacao->funcionario->id]),
            'Cadastro' => null,
        ],
    ])
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Funcionário: {{ $aplicacao->funcionario->nome_completo }} (CPF: {{ $aplicacao->funcionario->cpf() }})
            </h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('aplicacao.update', ['aplicacao' => $aplicacao->id]) }}">
                @csrf
                @method('PUT')
                @include('aplicacao.form')
            </form>
        </div>
    </div>
@stop
