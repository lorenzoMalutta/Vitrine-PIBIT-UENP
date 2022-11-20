<?php

namespace App\Http\Controllers;

use App\Models\Midia;
use App\Models\Servico;
use Exception;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    try {
      $servico = Servico::all()->toArray();
      $midia = Midia::all()->toArray();
      $merged = array_merge($servico, $midia);
    } catch (Exception $e) {
      return response()->json([
        'message' => 'Erro ao cadastrar serviço',
        'error' => $e->getMessage()
      ], 500);
    }
    return response()->json($merged);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $midia = Midia::create($request->all());
      $servico = Servico::create($request->all());
    } catch (Exception $e) {
      return response()->json([
        'message' => 'Erro ao cadastrar serviço',
        'error' => $e->getMessage()
      ], 500);
    }
    return response()->json([
      'message' => 'Serviço cadastrado com sucesso',
      'servico' => $servico,
      'midia' => $midia,
    ], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    try {
      $midia = Midia::findOrFail($id)->toArray();
      $servico = Servico::findOrFail($id)->toArray();
      $merged = array_merge($servico, $midia);
    } catch (Exception $e) {
      return response()->json([
        'message' => 'Erro ao cadastrar serviço',
        'error' => $e->getMessage()
      ], 500);
    }

    return response()->json($merged);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try {
      $servico = Servico::find($id);
      $servico->update($request->all());
      $midia = Midia::find($id);
      $midia->update($request->all());
    } catch (Exception $e) {
      return response()->json([
        'message' => 'Erro ao atualizar serviço',
        'error' => $e->getMessage()
      ], 500);
    }
    return response()->json([
      'message' => 'Serviço atualizado com sucesso',
      'servico' => $servico,
      'midia' => $midia,
    ], 201);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $servico = Servico::find($id);
      $servico->delete();
      $midia = Midia::find($id);
      $midia->delete();
    } catch (Exception $e) {
      return response()->json([
        'message' => 'Erro ao deletar serviço',
        'error' => $e->getMessage()
      ], 500);
    }
    return response()->json([
      'message' => 'Serviço deletado com sucesso',
      'servico' => $servico,
      'midia' => $midia,
    ], 201);
  }
}
