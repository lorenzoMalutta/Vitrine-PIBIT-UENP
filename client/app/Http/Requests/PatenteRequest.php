<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatenteRequest extends FormRequest
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
      'area_economica' => 'required|string|max:255',
      'area_cientifica' => 'required|string|max:255',
      'sinopse'     => 'required|string|min:125|max:255',
      'pct'         => 'nullable|string|max:255',
      'inpi'        => 'required|string|max:255|unique:patentes',
      'resumo'      => 'required|string|min:255|max:500',
      'problema'    => 'required|string|min:255|max:500',
      'vantagem'    => 'required|string|min:255|max:500',
      'aplicacao'   => 'required|string|min:255|max:500',
      'trl'         => 'required|string|max:255',
      'telefone'    => 'required|integer',
      'email'       => 'required|string|max:255',
      'colaborador' => 'nullable|string|max:255',
      'data_criacao' => 'required|string|max:255',
      'links'       => 'nullable|string|max:255',
      'criadores'   => 'required|string|max:255',
      'image'       => 'required|mimes:png,jpg,svg|max:2048',
      'video'       => 'required|mimes:mp4,mov,ogg|max: 20000',
      'pdf'         => 'required|max:4096',
    ];
  }

  public function messages()
  {
    return [
      'nome'          => 'O campo nome da tecnologia é obrigatório',
      'area_economica' => 'O campo área econômica é obrigatório',
      'area_cientifica' => 'O campo área científica é obrigatório',
      'sinopse'       => 'O campo sinopse é obrigatório',
      'pct'           => 'O campo pct é obrigatório',
      'inpi'          => 'O campo inpi é obrigatório',
      'resumo'        => 'O campo resumo é obrigatório',
      'problema'      => 'O campo problema é obrigatório',
      'vantagem'      => 'O campo vantagem é obrigatório',
      'aplicacao'     => 'O campo aplicacao é obrigatório',
      'trl'           => 'O campo trl é obrigatório',
      'telefone'      => 'O campo telefone é obrigatório',
      'email'         => 'O campo email é obrigatório',
      'colaborador'   => 'O campo colaborador é obrigatório',
      'data_criacao'  => 'O campo data de criacao é obrigatório',
      'links'         => 'O campo links é obrigatório',
      'criadores'     => 'O campo criadores é obrigatório',
      'tipo'          => 'O campo tipo é obrigatório',
      'image'         => 'O campo imagem é obrigatório',
      'video'         => 'O campo vídeo é obrigatório',
      'pdf'           => 'O campo pdf é obrigatório',
    ];
  }
}
