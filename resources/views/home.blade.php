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
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                <a href="{{ route('funcionario.index') }}">
                    <div class="small-box bg-lightblue">
                        <div class="inner">
                            <h3>{{ $qtd_funcionarios }}</h3>
                            <p>Funcionários</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                <a href="{{ route('vacina.index') }}">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{ $qtd_vacinas }}</h3>
                            <p>Vacinas</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-prescription-bottle-alt"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                <a href="{{ route('aplicacao.index') }}">
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>{{ $qtd_vacinas_aplicadas }}</h3>
                            <p>Vacinas Aplicadas</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-shield"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                <a href="{{ route('funcionario.naoVacinados') }}">
                    <div class="small-box bg-warning">
                        <div class="inner  text-white">
                            <h3>{{ $qtd_funcionarios_nao_vacinados }}</h3>
                            <p>Funcionários Não Vacinados</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-times"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <h4 class="">
            Últimas Vacinas Aplicadas
        </h4>
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <th>Funcionario:</th>
                        <th>Vacina / Lote:</th>
                        <th style="width: 160px">Aplicado em:</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($aplicacoes as $aplicacao)
                            <tr>
                                <td>{{ $aplicacao->funcionario->nome_completo }} </td>
                                <td>{{ $aplicacao->vacina->nome }} / {{ $aplicacao->vacina->lote }} </td>
                                <td>{{ $aplicacao->data_aplicacao }} </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('funcionario.show', ['funcionario' => $aplicacao->funcionario_id]) }}"
                                            class="btn btn-sm btn-info" title="Ver">
                                            Funcionário
                                        </a>
                                        <a href="{{ route('vacina.show', ['vacina' => $aplicacao->vacina_id]) }}"
                                            class="btn btn-sm btn-warning" title="Ver">
                                            Vacina
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if ($aplicacoes->count() <= 0)
            <p>Nenhum dado encontrado.</p>
        @endif
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
