<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'nascimento' => 'required',
            'sexo' => 'required',
            'cidade' => 'required'
        ];
    }
    public function messages():array
    {
        return[
            'nome.required' => 'Campo Nome Obrigatorio',
            'nascimento.required' => 'Campo Nascimento Obrigatorio',
            'sexo.required' => 'Campo Sexo Obrigatorio',
            'cidade.required' => 'Campo Cidade Obrigatorio'
        ];
    }

}
