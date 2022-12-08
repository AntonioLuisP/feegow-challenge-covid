@extends('utils.layout.modal.searchModal')

@section('form')
    <div class="row">
        <div class="form-group col-sm-5">
            <label class="form-label">Ordene</label>
            <select class="form-control form-select" name="field">
                <option value="created_at"
                    {{ isset($_GET['field']) ? ($_GET['field'] === 'created_at' ? 'selected' : '') : '' }}>
                    Data de Criação
                </option>
                <option value="nome" {{ isset($_GET['field']) ? ($_GET['field'] === 'nome' ? 'selected' : '') : '' }}>
                    Nome
                </option>
            </select>
        </div>
        @include('utils.layout.form.orderSearch')
    </div>
@stop
