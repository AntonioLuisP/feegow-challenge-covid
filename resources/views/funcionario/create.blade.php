@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Cadastro de Funcionário',
        'items' => [
            'Funcionários' => route('funcionario.index'),
            'Cadastro' => null,
        ],
    ])
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('funcionario.store') }}">
                @csrf
                @include('funcionario.form')
            </form>
        </div>
    </div>
@stop
