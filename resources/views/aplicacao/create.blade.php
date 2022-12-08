@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Cadastro de Aplicação de Vacina',
        'items' => [
            'Funcionários' => route('funcionario.index'),
            'Funcionário' => route('funcionario.show', ['funcionario' => $funcionario->id]),
            'Cadastro' => null,
        ],
    ])
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Funcionário: {{ $funcionario->nome_completo }} (CPF: {{ $funcionario->cpf() }})</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('aplicacao.store', ['funcionario' => $funcionario->id]) }}">
                @csrf
                @include('aplicacao.form')
            </form>
        </div>
    </div>
@stop
