<?php

namespace App\Http\Controllers;

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
    return Patente::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PatenteRequest $request)
  {
    try {
      $patente = Patente::create($request->all());
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao cadastrar patente',
        'error' => $e->getMessage()
      ], 500);
    }


    return response()->json([
      'patente' => $patente
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return Patente::find($id);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(PatenteRequest $request, $id)
  {
    $patente = Patente::find($id);
    $patente->update($request->all());
    return $patente;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    return Patente::destroy($id);
  }
}
