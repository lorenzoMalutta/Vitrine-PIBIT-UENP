<?php

namespace App\Http\Controllers;

use App\Models\AreaCientifica;
use App\Models\AreaEconomica;
use App\Models\Midia;
use App\Models\PalavraChave;
use App\Models\Software;
use Exception;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $areaCientifica = AreaCientifica::all();
    $areaEconomica = AreaEconomica::all();
    $palavraChave =  PalavraChave::all();

    return response()->json([
      'areaCientifica' => $areaCientifica,
      'areaEconomica' => $areaEconomica,
      'palavraChave' => $palavraChave,
    ]);
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
