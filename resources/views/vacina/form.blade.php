<p>Itens com <b>*</b> são obrigatórios</p>

<div class="form-group">
    <label>Nome *</label>
    <input type="text" class="form-control" name="nome" value="{{ old('nome') ?? ($vacina->nome ?? '') }}" required>
    {!! $errors->first('nome', '<span style="color:red" class="help-block">:message</span>') !!}
</div>

<div class="row">
    <div class="form-group col-sm-8">
        <label>Lote *</label>
        <input type="text" class="form-control" name="lote" value="{{ old('lote') ?? ($vacina->lote ?? '') }}"
            required>
        {!! $errors->first('lote', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
    <div class="form-group col-sm-4">
        <label>Data de Validade *</label>
        <input type="date" class="form-control" name="data_validade"
            value="{{ old('data_validade') ?? ($vacina->data_validade ?? '') }}" required>
        {!! $errors->first('data_validade', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
</div>

@include('utils.layout.submitButton')
