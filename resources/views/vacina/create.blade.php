@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Cadastro de Vacina',
        'items' => [
            'Vacinas' => route('vacina.index'),
            'Cadastro' => null,
        ],
    ])
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('vacina.store') }}">
                @csrf
                @include('vacina.form')
            </form>
        </div>
    </div>
@stop
