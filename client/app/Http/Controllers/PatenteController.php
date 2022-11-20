<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
use App\Http\Requests\PatenteRequest;
use App\Models\Patente;
use App\Models\Midia;
use Ramsey\Uuid\Uuid;

class PatenteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    try {
      $patente = Patente::all()->toArray();
      $midia = Midia::all()->toArray();
      $merged = array_merge($patente, $midia);
    } catch (\Exception $e) {
      return response()->json(['error' => $e->getMessage()], 500);
    }
    return response()->json($merged);
  }

  //method to merge two models and return the result
  public function mergeModels($model1, $model2)
  {
    $merged = $model1->merge($model2);
    return $merged;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  App\Http\Requests\PatenteRequest;  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PatenteRequest $request)
  {
    try {
      $midia = Midia::created($request->all());
      $patente = Patente::create($request->all());
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao cadastrar patente',
        'error' => $e->getMessage()
      ], 500);
    }

    return response()->json([
      'patente' => $patente,
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
      $patente = Patente::findOrFail($id)->toArray();
      $midia = Midia::findOrFail($id)->toArray();
      $merged = array_merge($patente, $midia);
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Patente não encontrada',
        'error' => $e->getMessage()
      ], 404);
    }

    return response()->json($merged, 201);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  App\Http\Requests\PatenteRequest  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(PatenteRequest $request, $id)
  {
    try {
      $patente = Patente::find($id);
      $patente->update($request->all());
      $midia = Midia::find($id);
      $midia->update($request->all());
      $merged = array_merge($patente, $midia);
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao atualizar patente',
        'error' => $e->getMessage()
      ], 500);
    }
    return response()->json($merged);
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
      $midia = Midia::find($id);
      $midia->delete();
      $patente = Patente::find($id);
      $patente->delete();
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao deletar patente',
        'error' => $e->getMessage()
      ], 500);
    }

    return response()->json([
      'message' => 'Patente deletada com sucesso'
    ], 200);
  }
}
