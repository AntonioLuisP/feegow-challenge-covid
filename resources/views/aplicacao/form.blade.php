<p>Itens com <b>*</b> são obrigatórios</p>

<div class="row">
    <div class="form-group col-sm-8">
        <label>Vacina (Nome/Lote) *</label>
        <select class="form-control" name="vacina_id" required>
            <option value="">Selecione uma das Vacinas</option>
            @foreach ($vacinas as $vacina)
                <option value={{ $vacina->id }}
                    {{ old('vacina_id') === $vacina->id ? 'selected' : (isset($aplicacao) ? ($aplicacao->vacina_id === $vacina->id ? 'selected' : '') : '') }}>
                    {{ $vacina->nome }} / {{ $vacina->lote }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('vacina_id', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
    <div class="form-group col-sm-4">
        <label>Data da Aplicação *</label>
        <input type="date" class="form-control" name="data_aplicacao"
            value="{{ old('data_aplicacao') ?? ($aplicacao->data_aplicacao ?? '') }}" required>
        {!! $errors->first('data_aplicacao', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
</div>

@include('utils.layout.submitButton')
