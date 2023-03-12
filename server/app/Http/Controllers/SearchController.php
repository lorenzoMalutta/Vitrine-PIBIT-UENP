<?php

namespace App\Http\Controllers;

use App\Models\AreaCientifica;
use App\Models\Laboratorio;
use App\Models\Patente;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchPatente(Request $request)
    {
        $patente = Patente::Where('palavra_chave', 'like', '%' . $request->search . '%')->get();
        return response()->json($patente, 201);
    }

    public function searchLaboratorio(Request $request)
    {
        $laboratorio = Laboratorio::Where('nome', 'like', '%' . $request->search . '%')->get();
        return response()->json($laboratorio, 201);
    }
}
