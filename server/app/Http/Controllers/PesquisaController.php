<?php

namespace App\Http\Controllers;

use App\Models\Pesquisa;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PesquisaController extends Controller
{
    //make the method like server\app\Http\Controllers\PatenteController.php

    public function index()
    {
        try {
            $pesquisa = Pesquisa::all()->toArray();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($pesquisa, 201);
    }

    public function store(Request $request)
    {
        try {
            $pesquisa = Pesquisa::create([
                'nome' => $request->nome,
                'area_economica' => $request->area_economica,
                'area_cientifica' => $request->area_cientifica,
                'sinopse' => $request->sinopse,
                'solucao' => $request->solucao,
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
            $pesquisa->save();
            if ($request->hasFile('image')) {
                $destinationPath = "public/images/pesquisa";
                $namePath = "/images/pesquisa/";
                $extension = $request->image->getClientOriginalExtension();
                $name = Uuid::uuid1();
                $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
                $pesquisa->image =  $namePath . $name . "." . $extension;
                $pesquisa->save();
            }
            if ($request->hasFile('pdf')) {
                $destinationPath = "public/pdf/pesquisa";
                $namePath = "/pdf/pesquisa/";
                $extension = $request->pdf->getClientOriginalExtension();
                $name = Uuid::uuid1();
                $path['pdf'] = $request->file('pdf')->storeAs($destinationPath, $name . ".{$extension}");
                $pesquisa->pdf = $namePath . $name . "." . $extension;
                $pesquisa->save();
            }
            if ($request->hasFile('video')) {
                $destinationPath = "public/video/pesquisa";
                $namePath = "/video/pesquisa/";
                $extension = $request->video->getClientOriginalExtension();
                $name = Uuid::uuid1();
                $path['video'] = $request->file('video')->storeAs($destinationPath, $name . ".{$extension}");
                $pesquisa->video = $namePath . $name . "." . $extension;
                $pesquisa->save();
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($pesquisa, 201);
    }

    public function show($id)
    {
        try {
            $pesquisa = Pesquisa::find($id);
            if (!$pesquisa) throw new \Exception("Não foi possível encontrar a pesquisa com o id: {$id}");
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($pesquisa, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $pesquisa = Pesquisa::find($id);
            if (!$pesquisa) throw new \Exception("Não foi possível encontrar a pesquisa com o id: {$id}");
            $pesquisa->update([
                'nome' => $request->nome,
                'area_economica' => $request->area_economica,
                'area_cientifica' => $request->area_cientifica,
                'sinopse' => $request->sinopse,
                'solucao' => $request->solucao,
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
            $pesquisa->save();
            if ($request->hasFile('image')) {
                $destinationPath = "public/images/pesquisa";
                $namePath = "/images/pesquisa/";
                $extension = $request->image->getClientOriginalExtension();
                $name = Uuid::uuid1();
                $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
                $pesquisa->image =  $namePath . $name . "." . $extension;
                $pesquisa->save();
            }
            if ($request->hasFile('pdf')) {
                $destinationPath = "public/pdf/pesquisa";
                $namePath = "/pdf/pesquisa/";
                $extension = $request->pdf->getClientOriginalExtension();
                $name = Uuid::uuid1();
                $path['pdf'] = $request->file('pdf')->storeAs($destinationPath, $name . ".{$extension}");
                $pesquisa->pdf = $namePath . $name . "." . $extension;
                $pesquisa->save();
            }
            if ($request->hasFile('video')) {
                $destinationPath = "public/video/pesquisa";
                $namePath = "/video/pesquisa/";
                $extension = $request->video->getClientOriginalExtension();
                $name = Uuid::uuid1();
                $path['video'] = $request->file('video')->storeAs($destinationPath, $name . ".{$extension}");
                $pesquisa->video = $namePath . $name . "." . $extension;
                $pesquisa->save();
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($pesquisa, 201);
    }

    public function destroy($id)
    {
        try {
            $pesquisa = Pesquisa::find($id);
            if (!$pesquisa) throw new \Exception("Não foi possível encontrar a pesquisa com o id: {$id}");
            $pesquisa->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json(['success' => 'Pesquisa deletada com sucesso!'], 201);
    }
}
