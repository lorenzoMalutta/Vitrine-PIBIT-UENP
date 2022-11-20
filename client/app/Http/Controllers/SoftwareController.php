<?php

namespace App\Http\Controllers;

use App\Models\Midia;
use App\Models\Software;
use Exception;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    try {
      $software = Software::all()->toArray();
      $midia = Midia::all()->toArray();
      $merged = array_merge($software, $midia);
    } catch (Exception $e) {
      return response()->json([
        'message' => 'Erro ao listar softwares',
        'error' => $e->getMessage()
      ], 500);
    }

    return response()->json([$merged]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try{
      $midia = Midia::create($request->all());
      $software = Software::create($request->all());
      $merged = array_merge($software, $midia);
    }catch(Exception $e){
      return response()->json([
        'message' => 'Erro ao cadastrar software',
        'error' => $e->getMessage()
      ], 500);
    }

    return response()->json([
      'message' => 'Software cadastrado com sucesso',
      'software' => $merged,
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
      $software = Software::findOrFail($id)->toArray();
      $merged = array_merge($software, $midia);
    } catch (Exception $e) {
      return response()->json([
        'message' => 'Erro ao listar software',
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
    try{
      $midia = Midia::findOrFail($id);
      $software = Software::findOrFail($id);
      $midia->update($request->all());
      $software->update($request->all());
      $merged = array_merge($software, $midia);
    }catch(Exception $e){
      return response()->json([
        'message' => 'Erro ao atualizar software',
        'error' => $e->getMessage()
      ], 500);
    }

    return response()->json([
      'message' => 'Software atualizado com sucesso',
      'software' => $merged,
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
    try{
      $midia = Midia::findOrFail($id);
      $software = Software::findOrFail($id);
      $midia->delete();
      $software->delete();
    } catch (Exception $e) {
      return response()->json([
        'message' => 'Erro ao deletar software',
        'error' => $e->getMessage()
      ], 500);
    }

    return response()->json([
      'message' => 'Software deletado com sucesso',
    ], 201);
  }
}
