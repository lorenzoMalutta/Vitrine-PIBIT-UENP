<?php

namespace App\Http\Controllers;

use App\Models\Midia;
use App\Models\Software;
use Ramsey\Uuid\Uuid;
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
    try {
      $midia = new Midia;
      $software = Software::create($request->all());
      $midia->idSoftware = $software->id;
      $midia->save();
      if ($request->hasFile('image')) {
        $destinationPath = "public/images/software";
        $extension = $request->image->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
        $midia->image = $name . "." . $extension;
        $midia->save();
      }
      if ($request->hasFile('video')) {
        $destinationPath = "public/videos/software";
        $extension = $request->video->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['video'] = $request->file('video')->storeAs($destinationPath, $name . ".{$extension}");
        $midia->video = $name . "." . $extension;
        $midia->save();
      }
      $merged = array_merge($software, $midia);
    } catch (Exception $e) {
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
    try {
      $software = Software::findOrFail($id);
      $software->update($request->all());
      $midia = Midia::findOrFail($request->idSoftware);
      if ($midia->image) {
        $destinationPath = "public/images/software";
        $extension = $request->image->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
        $midia->image = $name . "." . $extension;
        $midia->update();
      }
      if ($midia->video) {
        $destinationPath = "public/videos/software";
        $extension = $request->image->getClientOriginalExtension();
        $name = Uuid::uuid1();
        $path['video'] = $request->file('video')->storeAs($destinationPath, $name . ".{$extension}");
        $midia->video = $name . "." . $extension;
        $midia->update();
      }
      $merged = array_merge($software, $midia);
    } catch (Exception $e) {
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
    try {
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
