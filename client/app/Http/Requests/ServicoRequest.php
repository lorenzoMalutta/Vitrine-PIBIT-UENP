<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
      return [
        'nome'        => 'required|string|max:255',
        'sinopse'     => 'required|string|min:125|max:255',
        'resumo'      => 'required|string|min:255|max:500',
        'problema'    => 'required|string|min:255|max:500',
        'aplicacao'   => 'required|string|min:255|max:500',
        'telefone'    => 'required|integer',
        'email'       => 'required|string|max:255',
        'data_criacao'=> 'required|string|max:255',
        'links'       => 'nullable|string|max:255',
        'criadores'   => 'required|string|max:255',
        'area_economica' => 'required|string|max:255',
        'area_cientifica' => 'required|string|max:255',
        'palavra_chave' => 'required|string|max:255',
        'image'       => 'required|mimes:png,jpg,svg|max:2048',
      ];
    }
}
