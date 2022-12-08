@extends('utils.layout.modal.searchModal')

@section('form')
    <div class="row">
        <div class="form-group col-sm-9">
            <label class="form-label">Nome</label>
            <input type="text" name="nome_completo" class="form-control" maxlength="45" placeholder="Nome"
                value="{{ $_GET['nome_completo'] ?? '' }}">
        </div>
        <div class="form-group col-sm-3">
            <label class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" maxlength="45" placeholder="cpf"
                value="{{ $_GET['cpf'] ?? '' }}">
        </div>
        <div class="form-group col-sm-5">
            <label class="form-label">Ordene</label>
            <select class="form-control form-select" name="field">
                <option value="created_at"
                    {{ isset($_GET['field']) ? ($_GET['field'] === 'created_at' ? 'selected' : '') : '' }}>
                    Data de Criação
                </option>
                <option value="nome_completo"
                    {{ isset($_GET['field']) ? ($_GET['field'] === 'nome_completo' ? 'selected' : '') : '' }}>
                    Nome
                </option>
            </select>
        </div>
        @include('utils.layout.form.orderSearch')
    </div>
@stop
