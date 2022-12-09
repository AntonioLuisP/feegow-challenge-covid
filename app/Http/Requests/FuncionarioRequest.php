<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FuncionarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome_completo' => ['required', 'string'],
            'cpf' => [
                'required',
                'cpf',
                'string',
                'size:11',
                Rule::unique('funcionarios', 'cpf')->ignore($this->funcionario ?? null, 'id')
            ],
            'data_nascimento' => ['required', 'date'],
            'tem_comorbidade' => ['required', 'boolean']
        ];
    }
}
