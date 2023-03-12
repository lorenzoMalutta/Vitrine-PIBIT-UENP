<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PatenteRequest;
use App\Models\Patente;
use Illuminate\Support\Facades\Storage;
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
        return response()->json($patente, 201);
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
            $patente = Patente::create([
                'nome' => $request->nome,
                'area_economica' => $request->area_economica,
                'area_cientifica' => $request->area_cientifica,
                'sinopse' => $request->sinopse,
                'pct' => $request->pct,
                'solucao' => $request->solucao,
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
            $patente->save();
            if ($request->hasFile('image')) {
                $destinationPath = "public/images/patente";
                $namePath = "/images/patente/";
                $extension = $request->image->getClientOriginalExtension();
                $name = Uuid::uuid1();
                $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
                $patente->image =  $namePath . $name . "." . $extension;
                $patente->save();
            }
            if ($request->hasFile('pdf')) {
                $destinationPath = "public/pdf/patente";
                $namePath = "/pdf/patente/";
                $extension = $request->pdf->getClientOriginalExtension();
                $name = Uuid::uuid1();
                $path['pdf'] = $request->file('pdf')->storeAs($destinationPath, $name . ".{$extension}");
                $patente->pdf = $namePath . $name . "." . $extension;
                $patente->save();
            }
            if ($request->hasFile('video')) {
                $destinationPath = "public/video/patente";
                $namePath = "/video/patente/";
                $extension = $request->video->getClientOriginalExtension();
                $name = Uuid::uuid1();
                $path['video'] = $request->file('video')->storeAs($destinationPath, $name . ".{$extension}");
                $patente->video = $namePath . $name . "." . $extension;
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
     * @param  App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PatenteRequest $request)
    {
        try {
            $patente = Patente::findOrFail($request->id);

            $patente->nome = $request->input('nome');
            $patente->area_economica = $request->input('area_economica');
            $patente->area_cientifica = $request->input('area_cientifica');
            $patente->sinopse = $request->input('sinopse');
            $patente->pct = $request->input('pct');
            $patente->solucao = $request->input('solucao');
            $patente->inpi = $request->input('inpi');
            $patente->resumo = $request->input('resumo');
            $patente->problema = $request->input('problema');
            $patente->vantagem = $request->input('vantagem');
            $patente->aplicacao = $request->input('aplicacao');
            $patente->trl = $request->input('trl');
            $patente->telefone = $request->input('telefone');
            $patente->email = $request->input('email');
            $patente->colaborador = $request->input('colaborador');
            $patente->data_criacao = $request->input('data_criacao');
            $patente->links = $request->input('links');
            $patente->criadores = $request->input('criadores');
            $patente->palavra_chave = $request->input('palavra_chave');
            if ($request->hasFile('image')) {
                $destinationPath = "public/images/patente";
                $namePath = "/images/patente/";
                $extension = $request->image->getClientOriginalExtension();
                $name = Uuid::uuid1();
                if ($request->file('image')->storeAs($destinationPath, $name . ".{$extension}")) {
                    $patente->image = $namePath . $name . "." . $extension;
                }
            }
            if ($request->hasFile('pdf')) {
                $destinationPath = "public/pdf/patente";
                $namePath = "/pdf/patente/";
                $extension = $request->pdf->getClientOriginalExtension();
                $name = Uuid::uuid1();
                if ($request->file('pdf')->storeAs($destinationPath, $name . ".{$extension}")) {
                    $patente->pdf = $namePath . $name . "." . $extension;
                }
            }
            if ($request->hasFile('video')) {
                $destinationPath = "public/video/patente";
                $namePath = "/video/patente/";
                $extension = $request->video->getClientOriginalExtension();
                $name = Uuid::uuid1();
                if ($request->file('video')->storeAs($destinationPath, $name . ".{$extension}")) {
                    $patente->video = $namePath . $name . "." . $extension;
                }
            }
            $patente->save();
            dd($request);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar patente',
                'error' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Patente atualizado com sucesso',
            'patente' => $patente,
        ], 200);
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
            //delete image from storage folder if exists 
            if ($patente->image) {
                $image_path = "public/images/patente/" . $patente->image;
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path);
                }
            }
            //delete video from storage folder if exists
            if ($patente->video) {
                $video_path = "public/video/patente/" . $patente->video;
                if (Storage::exists($video_path)) {
                    Storage::delete($video_path);
                }
            }
            //delete pdf from storage folder if exists
            if ($patente->pdf) {
                $pdf_path = "public/pdf/patente/" . $patente->pdf;
                if (Storage::exists($pdf_path)) {
                    Storage::delete($pdf_path);
                }
            }
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
