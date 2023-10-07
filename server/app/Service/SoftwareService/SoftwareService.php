<?php 
namespace App\Service\SoftwareService;

use App\Http\Requests\SoftwareRequest;
use App\Models\Software;
use App\Service\FileService\IFileService;
use App\Service\SoftwareService\ISoftwareService;

class SoftwareService implements ISoftwareService 
{
    private Software $_software;
    private IFileService $_fileService;

    public function __construct(Software $software, IFileService $fileService)
    {
      $this->_software = $software;
      $this->_fileService = $fileService;
    }

    function index(int $skip = 0, int $take = 10){
        return $this -> _software->skip($skip)->take($take)->get();
    }

    function store(SoftwareRequest $request){
        $this->_software->create([
            'nome' => $request->nome,
            'area_economica' => $request->area_economica,
            'area_cientifica' => $request->area_cientifica,
            'sinopse' => $request->sinopse,
            'resumo' => $request->resumo,
            'problema' => $request->problema,
            'aplicacao' => $request->aplicacao,
            'vantagem' => $request->vantagem,
            'colaborador' => $request->colaborador,
            'data_criacao' => $request->data_criacao,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'links' => $request->links,
            'palavra_chave' => $request->palavra_chave,
            'criadores' => $request->criadores,
            'tecnologia' => $request->tecnologia,
        ]);
    
          $this->_fileService->imageStorage($request->image, 'software');
          $this->_fileService->videoStorage($request->video, 'software');
          $this->_fileService->pdfStorage($request->pdf, 'software');
          
          $this->_software->save();
    }

    function show(int $id){
        return $this->_software->find($id)->json();
    }

    function update(SoftwareRequest $request, int $id){
        $software = Software::findOrFail($id);

        $software->_software->update([
            'nome' => $request->nome,
            'area_economica' => $request->area_economica,
            'area_cientifica' => $request->area_cientifica,
            'sinopse' => $request->sinopse,
            'resumo' => $request->resumo,
            'problema' => $request->problema,
            'aplicacao' => $request->aplicacao,
            'vantagem' => $request->vantagem,
            'colaborador' => $request->colaborador,
            'data_criacao' => $request->data_criacao,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'links' => $request->links,
            'palavra_chave' => $request->palavra_chave,
            'criadores' => $request->criadores,
            'tecnologia' => $request->tecnologia,
        ]);
    
          $this->_fileService->imageStorage($request->image, 'software');
          $this->_fileService->videoStorage($request->video, 'software');
          $this->_fileService->pdfStorage($request->pdf, 'software');
          
          $this->_software->update();

    }

    function destroy(int $id){
        return $this->_software->find($id)->delete();
    }

}