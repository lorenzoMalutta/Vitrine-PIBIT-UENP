<?php 
namespace App\Service\PesquisaService;

use App\Models\Pesquisa;
use App\Service\FileService\IFileService;
use App\Service\PesquisaService\IPesquisaService;

class PesquisaService implements IPesquisaService {
    private Pesquisa $_pesquisa;
    private IFileService $_fileService;

    public function __construct(Pesquisa $pesquisa, IFileService $fileService) {
        $this->_pesquisa = $pesquisa;
        $this->_fileService = $fileService;
    }
    public function getAll(int $skip = 0, int $take = 10) {
        return $this -> _pesquisa->skip($skip)->take($take)->get();
    }
    public function getById(int $id) {
        return $this->_pesquisa->findOrFail($id)->json();
    }
    public function create(Pesquisa $request) {
        $this->_pesquisa->create([
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

        $this->_fileService->imageStorage($request->image, 'pesquisa');
        $this->_fileService->videoStorage($request->video, 'pesquisa');
        $this->_fileService->pdfStorage($request->pdf, 'pesquisa');

        $this->_pesquisa->save();
    }
    public function update(Pesquisa $request, int $id) {
        $pesquisa = Pesquisa::findOrFail($id);
        
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

        $this->_fileService->imageStorage($request->image, 'pesquisa');
        $this->_fileService->videoStorage($request->video, 'pesquisa');
        $this->_fileService->pdfStorage($request->pdf, 'pesquisa');

        $this->_pesquisa->save();
    }
    public function delete(int $id) {
        return $this->_pesquisa->find($id)->delete();
    }
}