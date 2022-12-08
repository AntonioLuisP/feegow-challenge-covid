@extends('adminlte::page')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Feegow Covid',
        'items' => [
            'Início' => null,
        ],
    ])
@stop

@section('content')
    @auth
        esta logado
    @else
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                Faça login para Acessar o sistema
            </div>
        </div>
    @endauth

@endsection
