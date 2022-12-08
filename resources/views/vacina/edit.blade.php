@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Edição de Vacina',
        'items' => [
            'Vacinas' => route('vacina.index'),
            'Vacina' => route('vacina.show', $vacina->id),
            'Edição' => null,
        ],
    ])
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('vacina.update', ['vacina' => $vacina->id]) }}">
                @csrf
                @method('PUT')
                @include('vacina.form')
            </form>
        </div>
    </div>
@stop
