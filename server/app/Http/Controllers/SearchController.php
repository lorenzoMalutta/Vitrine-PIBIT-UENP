<?php

namespace App\Http\Controllers;

use App\Models\AreaCientifica;
use App\Models\Patente;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function searchPatente(Request $request)
  {
    $patente = Patente::where('nome', 'like', '%' . $request->search . '%')
      ->orWhere('area_economica', 'like', '%' . $request->search . '%')
      ->orWhere('area_cientifica', 'like', '%' . $request->search . '%')
      ->orWhere('sinopse', 'like', '%' . $request->search . '%')
      ->orWhere('pct', 'like', '%' . $request->search . '%')
      ->orWhere('solucao', 'like', '%' . $request->search . '%')
      ->orWhere('inpi', 'like', '%' . $request->search . '%')
      ->orWhere('resumo', 'like', '%' . $request->search . '%')
      ->orWhere('problema', 'like', '%' . $request->search . '%')
      ->orWhere('vantagem', 'like', '%' . $request->search . '%')
      ->orWhere('aplicacao', 'like', '%' . $request->search . '%')
      ->orWhere('trl', 'like', '%' . $request->search . '%')
      ->orWhere('telefone', 'like', '%' . $request->search . '%')
      ->orWhere('email', 'like', '%' . $request->search . '%')
      ->orWhere('colaborador', 'like', '%' . $request->search . '%')
      ->orWhere('data_criacao', 'like', '%' . $request->search . '%')
      ->orWhere('links', 'like', '%' . $request->search . '%')
      ->orWhere('criadores', 'like', '%' . $request->search . '%')
      ->orWhere('palavra_chave', 'like', '%' . $request->search . '%')
      ->get();
    return response()->json($patente, 201);
  }
}
