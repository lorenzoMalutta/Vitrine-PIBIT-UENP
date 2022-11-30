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
}
