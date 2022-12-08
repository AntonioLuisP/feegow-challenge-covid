@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Edição de Funcionário',
        'items' => [
            'Funcionários' => route('funcionario.index'),
            'Funcionário' => route('funcionario.show', $funcionario->id),
            'Edição' => null,
        ],
    ])
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('funcionario.update', ['funcionario' => $funcionario->id]) }}">
                @csrf
                @method('PUT')
                @include('funcionario.form')
            </form>
        </div>
    </div>
@stop
