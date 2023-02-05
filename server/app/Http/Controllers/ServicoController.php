<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Midia;
use App\Models\Servico;
use Ramsey\Uuid\Uuid;
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
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao cadastrar serviço',
        'error' => $e->getMessage()
      ], 500);
    }
    return response()->json($servico);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ServicoRequest $request)
  {
    try {
      $servico = Servico::create($request->all());
      if ($request->hasFile('image')) {
        $destinationPath = "public/images/servicos";
        $namePath = "/images/servicos/";
        $extension = $request->image->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
        $servico->image = $namePath . $name . "." . $extension;
        $servico->save();
      }
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao cadastrar serviço',
        'error' => $e->getMessage()
      ], 500);
    }
    return response()->json([
      'message' => 'Serviço cadastrado com sucesso',
      'servico' => $servico,
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
      $servico = Servico::findOrFail($id)->toArray();
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao mostrar serviço',
        'error' => $e->getMessage()
      ], 404);
    }

    return response()->json($servico, 201);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ServicoRequest $request, $id)
  {
    try {
      $servico = Servico::findOrFail($id);
      $servico->update($request->all());
      if ($request->image) {
        $destinationPath = "public/images/servicos";
        $extension = $request->image->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
        $servico->image = $name . "." . $extension;
        $servico->update();
      }
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao atualizar serviço',
        'error' => $e->getMessage()
      ], 500);
    }
    return response()->json([
      'message' => 'Serviço atualizado com sucesso',
      'servico' => $servico,
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
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao deletar serviço',
        'error' => $e->getMessage()
      ], 500);
    }
    return response()->json([
      'message' => 'Serviço deletado com sucesso',
    ], 201);
  }
}
