@extends('adminlte::page')

@section('content_header')
    <h1>Página de erro</h1>
@stop

@section('content')
    <div class="error-page">
        <h2 class="headline text-red">@yield('code')</h2>
        <div class="error-content">
            <h2>
                <i class="fa fa-warning text-red"></i>@yield('title')
            </h2>
            <h4>
                @yield('message')
            </h4>
            <h4>
                <a href="{{ route('home') }}">
                    Volter para o início
                </a>
            </h4>
        </div>
    </div>
@stop
