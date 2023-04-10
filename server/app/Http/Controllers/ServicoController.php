<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Ramsey\Uuid\Uuid;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(Request $request)
    {
        try {
            $servico = Servico::create([
                'nome' => $request->nome,
                'area_economica' => $request->area_economica,
                'area_cientifica' => $request->area_cientifica,
                'sinopse' => $request->sinopse,
                'resumo' => $request->resumo,
                'problema' => $request->problema,
                'aplicacao' => $request->aplicacao,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'links' => $request->links,
                'criadores' => $request->criadores,
                'palavra_chave' => $request->palavra_chave,
            ]);
            if ($request->hasFile('image')) {
                $destinationPath = "public/images/servicos";
                $namePath = "/images/servicos/";
                $extension = $request->image->getClientOriginalExtension();
                $name = Uuid::uuid1();
                $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
                $servico->image =  $namePath . $name . "." . $extension;
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $servico = Servico::findOrFail($request->id);
            $servico->nome = $request->input('nome');
            $servico->sinopse = $request->input('sinopse');
            $servico->problema = $request->input('problema');
            $servico->area_economica = $request->input('area_economica');
            $servico->area_cientifica = $request->input('area_cientifica');
            $servico->resumo = $request->input('resumo');
            $servico->aplicacao = $request->input('aplicacao');
            $servico->telefone = $request->input('telefone');
            $servico->email = $request->input('email');
            $servico->links = $request->input('links');
            $servico->criadores = $request->input('criadores');
            $servico->palavra_chave = $request->input('palavra_chave');
            $servico->update($request->all());
            if ($request->hasFile('image')) {
                $destinationPath = "public/images/servicos";
                $namePath = "/images/servicos/";
                $extension = $request->image->getClientOriginalExtension();
                $name = Uuid::uuid1();
                if ($request->file('image')->storeAs($destinationPath, $name . ".{$extension}")) {
                    $servico->image = $namePath . $name . "." . $extension;
                }
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
            if ($servico->image) {
                $image_path = "public/images/servicos/" . $servico->image;
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path);
                }
            }
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
