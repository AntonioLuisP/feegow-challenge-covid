<p>Itens com <b>*</b> são obrigatórios</p>

<div class="form-group">
    <label>Nome Completo*</label>
    <input type="text" class="form-control" name="nome_completo" required
        value="{{ old('nome_completo') ?? ($funcionario->nome_completo ?? '') }}">
    {!! $errors->first('nome_completo', '<span style="color:red" class="help-block">:message</span>') !!}
</div>

<div class="row">
    <div class="form-group col-sm-4">
        <label>CPF*</label>
        <input type="text" class="form-control" name="cpf" value="{{ old('cpf') ?? ($funcionario->cpf ?? '') }}"
            required>
        {!! $errors->first('cpf', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
    <div class="form-group col-sm-4">
        <label>Data de Nascimento*</label>
        <input type="date" class="form-control" name="data_nascimento"
            value="{{ old('data_nascimento') ?? ($funcionario->data_nascimento ?? '') }}" required>
        {!! $errors->first('data_nascimento', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
    <div class="form-group col-sm-4">
        <label>Tem Comorbidade*</label>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tem_comorbidade" value="1" required>
                    <label class="form-check-label">Sim</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tem_comorbidade" value='0' required>
                    <label class="form-check-label">Não</label>
                </div>
            </div>
        </div>
        {!! $errors->first('tem_comorbidade', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
</div>

@include('utils.layout.submitButton')
