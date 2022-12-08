<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacinaAplicacaoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'vacina_id' => ['required', 'exists:vacinas,id'],
            'data_aplicacao' => ['required', 'date'],
        ];
    }
}
