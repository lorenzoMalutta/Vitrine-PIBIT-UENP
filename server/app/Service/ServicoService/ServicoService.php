<?php
namespace App\Service\ServicoService;
use App\Http\Requests\ServicoRequest;
use App\Models\Servico;
use App\Service\FileService\IFileService;

class ServicoService implements IServicoService {
    private Servico $_servico;
    private IFileService $_fileService;

    public function __construct(Servico $servico, IFileService $fileService) {
        $this->_servico = $servico;
        $this->_fileService = $fileService;
    }

    public function getAll(int $skip = 0, int $take = 10) {
        return $this -> _servico->skip($skip)->take($take)->get();
    }

    public function getById(int $id) {
        return $this->_servico->findOrFail($id)->json();
    }

    public function create(ServicoRequest $request) {
        $this->_servico->create([
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

        $this->_fileService->imageStorage($request->image, 'servico');

        $this->_servico->save();
    }

    public function update(ServicoRequest $request, int $id) {
        $servico = Servico::findOrFail($id);
        
        $servico->update([
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
        $this->_fileService->imageStorage($request->image, 'servico');

        $this->_servico->update();
    }

    public function delete(int $id) {
        return $this->_servico->findOrFail($id)->delete();
    }
} 