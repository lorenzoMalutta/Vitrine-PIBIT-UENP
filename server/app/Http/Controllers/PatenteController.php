<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\PatenteRequest;
use App\Models\Patente;
// use App\Models\Midia;
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
    } catch (\Exception $e) {
      return response()->json(['error' => $e->getMessage()], 500);
    }
    return response()->json($patente);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  App\Http\Requests\PatenteRequest;  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $patente = Patente::create([
        'nome' => $request->nome,
        'area_economica' => $request->area_economica,
        'area_cientifica' => $request->area_cientifica,
        'sinopse' => $request->sinopse,
        'pct' => $request->pct,
        'inpi' => $request->inpi,
        'resumo' => $request->resumo,
        'problema' => $request->problema,
        'vantagem' => $request->vantagem,
        'aplicacao' => $request->aplicacao,
        'trl' => $request->trl,
        'telefone' => $request->telefone,
        'email' => $request->email,
        'colaborador' => $request->colaborador,
        'data_criacao' => $request->data_criacao,
        'links' => $request->links,
        'criadores' => $request->criadores,
        'palavra_chave' => $request->palavra_chave,
      ]); 
      if ($request->hasFile('image')) {
        $destinationPath = "public/images/patente";
        $extension = $request->image->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
        $patente->image = $name . "." . $extension;
        $patente->save();
      }
      if($request->hasFile('pdf')) {
        $destinationPath = "public/pdf/patente";
        $extension = $request->pdf->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['pdf'] = $request->file('pdf')->storeAs($destinationPath, $name . ".{$extension}");
        $patente->pdf = $name . "." . $extension;
        $patente->save();
      }
      if($request->hasFile('video')) {
        $destinationPath = "public/video/patente";
        $extension = $request->video->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['video'] = $request->file('video')->storeAs($destinationPath, $name . ".{$extension}");
        $patente->video = $name . "." . $extension;
        $patente->save();
      }
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao cadastrar patente',
        'error' => $e->getMessage()
      ], 500);
    }

    return response()->json([
      'message' => 'Patente cadastrada com sucesso',
      'patente' => $patente,
      'dd' => dd($patente),
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
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Patente não encontrada',
        'error' => $e->getMessage()
      ], 404);
    }

    return response()->json($patente, 201);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  App\Http\Requests\PatenteRequest  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try {
      $patente = Patente::findOrFail($request->$id);
      $patente->update($request->all());

      if ($patente->image) {
        $destinationPath = "public/images/patente";
        $extension = $request->image->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
        $patente->image = $name . "." . $extension;
        $patente->update();
      }
      if ($patente->video) {
        $destinationPath = "public/videos/patente";
        $extension = $request->video->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['video'] = $request->file('video')->storeAs($destinationPath, $name . ".{$extension}");
        $patente->video = $name . "." . $extension;
        $patente->update();
      }
      if ($patente->pdf) {
        $destinationPath = "public/pdf/patente";
        $extension = $request->pdf->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['pdf'] = $request->file('pdf')->storeAs($destinationPath, $name . ".{$extension}");
        $patente->pdf = $name . "." . $extension;
        $patente->update();
      }
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Erro ao atualizar patente',
        'error' => $e->getMessage()
      ], 500);
    }
    return response()->json([
      'message' => 'Patente atualizado com sucesso',
      'patente' => $patente,
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
    ], 201);
  }
}
