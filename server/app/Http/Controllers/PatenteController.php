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

  /**
   * Store a newly created resource in storage.
   *
   * @param  App\Http\Requests\PatenteRequest;  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PatenteRequest $request)
  {
    try {
      $patente = Patente::create($request->all());
      $midia = new Midia;

      $midia->idPatente = $patente->id;
      $midia->save();

      if ($request->hasFile('image')) {
        $destinationPath = "public/images/patente";
        $extension = $request->image->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
        $midia->image = $name . "." . $extension;
        $midia->save();
      }
      if ($request->hasFile('video')) {
        $destinationPath = "public/videos/patente";
        $extension = $request->video->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['video'] = $request->file('video')->storeAs($destinationPath, $name . ".{$extension}");
        $midia->video = $name . "." . $extension;
        $midia->save();
      }
      if ($request->hasFile('pdf')) {
        $destinationPath = "public/pdf/patente";
        $extension = $request->pdf->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['pdf'] = $request->file('pdf')->storeAs($destinationPath, $name . ".{$extension}");
        $midia->pdf = $name . "." . $extension;
        $midia->save();
      }
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
      $patente = Patente::findOrFail($request->$id);
      $patente->update($request->all());
      $midia = Midia::find($request->idPatente);

      if ($midia->image) {
        $destinationPath = "public/images/patente";
        $extension = $request->image->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
        $midia->image = $name . "." . $extension;
        $midia->update();
      }
      if ($midia->video) {
        $destinationPath = "public/videos/patente";
        $extension = $request->video->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['video'] = $request->file('video')->storeAs($destinationPath, $name . ".{$extension}");
        $midia->video = $name . "." . $extension;
        $midia->update();
      }
      if ($midia->pdf) {
        $destinationPath = "public/pdf/patente";
        $extension = $request->pdf->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['pdf'] = $request->file('pdf')->storeAs($destinationPath, $name . ".{$extension}");
        $midia->pdf = $name . "." . $extension;
        $midia->update();
      }
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
