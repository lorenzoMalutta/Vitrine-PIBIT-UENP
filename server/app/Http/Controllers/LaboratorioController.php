<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    public function index()
    {
        $laboratorios = Laboratorio::all();
        return response()->json($laboratorios, 200);
    }

    public function store(Request $request)
    {
        $laboratorio = Laboratorio::create([
            'nome' => $request->nome,
            'sinopse' => $request->sinopse,
            'resumo' => $request->resumo,
            'aplicacao' => $request->aplicacao,
            'colaborador' => $request->colaborador,
            'links' => $request->links,
            'area_cientifica' => $request->area_cientifica,
            'area_economica' => $request->area_economica,
            'palavras_chave' => $request->palavras_chave,
            'supervisores' => $request->supervisores,
            'conteudo' => $request->conteudo,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);
        $laboratorio->save();
        if ($request->hasFile('image')) {
            $destinationPath = "public/images/laboratorio";
            $namePath = "/images/laboratorio/";
            $extension = $request->image->getClientOriginalExtension();
            $name = Uuid::uuid1();
            $path['image'] = $request->file('image')->storeAs($destinationPath, $name . ".{$extension}");
            $laboratorio->image =  $namePath . $name . "." . $extension;
            $laboratorio->save();
        }
        if ($request->hasFile('pdf')) {
            $destinationPath = "public/pdf/laboratorio";
            $namePath = "/pdf/laboratorio/";
            $extension = $request->pdf->getClientOriginalExtension();
            $name = Uuid::uuid1();
            $path['pdf'] = $request->file('pdf')->storeAs($destinationPath, $name . ".{$extension}");
            $laboratorio->pdf = $namePath . $name . "." . $extension;
            $laboratorio->save();
        }
        return response()->json($laboratorio, 201);
    }

    public function show($id)
    {
        try {
            $laboratorio = Laboratorio::find($id);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json($laboratorio, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $laboratorio = Laboratorio::find($id);
            $laboratorio->nome = $request->nome;
            $laboratorio->sinopse = $request->sinopse;
            $laboratorio->resumo = $request->resumo;
            $laboratorio->aplicacao = $request->aplicacao;
            $laboratorio->colaborador = $request->colaborador;
            $laboratorio->links = $request->links;
            $laboratorio->area_cientifica = $request->area_cientifica;
            $laboratorio->area_economica = $request->area_economica;
            $laboratorio->palavras_chave = $request->palavras_chave;
            $laboratorio->supervisores = $request->supervisores;
            $laboratorio->conteudo = $request->conteudo;
            $laboratorio->imagem = $request->imagem;
            $laboratorio->pdf = $request->pdf;
            $laboratorio->telefone = $request->telefone;
            $laboratorio->email = $request->email;
            $laboratorio->save();
            if ($request->hasFile('image')) {
                $destinationPath = "public/images/laboratorio";
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = Uuid::uuid4() . '.' . $extension;
                $file->storeAs($destinationPath, $fileName);
                $laboratorio->imagem = $fileName;
                $laboratorio->save();
            }
            if ($request->hasFile('pdf')) {
                $destinationPath = "public/pdf/laboratorio";
                $file = $request->file('pdf');
                $extension = $file->getClientOriginalExtension();
                $fileName = Uuid::uuid4() . '.' . $extension;
                $file->storeAs($destinationPath, $fileName);
                $laboratorio->pdf = $fileName;
                $laboratorio->save();
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($laboratorio, 201);
    }

    public function destroy($id)
    {
        try {
            $laboratorio = Laboratorio::find($id);
            if ($laboratorio->image) {
                $image_path = "public/images/laboratorio/" . $laboratorio->image;
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path);
                }
            }
            if ($laboratorio->pdf) {
                $pdf_path = "public/pdf/laboratorio/" . $laboratorio->pdf;
                if (Storage::exists($pdf_path)) {
                    Storage::delete($pdf_path);
                }
            }
            $laboratorio->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($laboratorio, 201);
    }
}
