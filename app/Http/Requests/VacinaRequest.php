<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacinaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => ['required', 'string'],
            'lote' => ['required', 'string'],
            'data_validade' => ['required', 'date']
        ];
    }
}
