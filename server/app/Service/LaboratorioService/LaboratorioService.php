<?php

namespace App\Service\LaboratorioService;

use App\Models\Laboratorio;
use App\Service\FileService\IFileService;

class LaboratorioService implements ILaboratorioService {
    private Laboratorio $_laboratorio;
    private IFileService $_fileService;

    public function __construct(Laboratorio $laboratorio, IFileService $fileService) {
        $this->_laboratorio = $laboratorio;
        $this->_fileService = $fileService;
    }

    public function getAll(int $skip = 0, int $take = 10) {
        return $this -> _laboratorio->skip($skip)->take($take)->get();
    }

    public function getById(int $id) {
        return $this->_laboratorio->findOrFail($id)->json();
    }

    public function create(Laboratorio $request) {
        $this->_laboratorio->create([
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

        $this->_fileService->imageStorage($request->image, 'laboratorio');
        $this->_fileService->pdfStorage($request->pdf, 'laboratorio');

        $this->_laboratorio->save();
    }

    public function update(Laboratorio $request, int $id) {
        $laboratorio = Laboratorio::findOrFail($id);
        
        $laboratorio->update([
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

        $this->_fileService->imageStorage($request->image, 'laboratorio');
        $this->_fileService->pdfStorage($request->pdf, 'laboratorio');

        $laboratorio->save();
    }

    public function delete(int $id) {
        return $this->_laboratorio->findOrFail($id)->delete();
    }
}