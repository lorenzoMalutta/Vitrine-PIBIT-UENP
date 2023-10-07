<?php
namespace App\Service\PatenteService;

use App\Models\Patente;
use App\Http\Requests\PatenteRequest;
use App\Service\FileService\IFileService;
use App\Service\PatenteService\IPatenteService;

class PatenteService implements IPatenteService
{
  private Patente $_patente;
  private IFileService $_fileService;
  
  public function __construct(Patente $patente, IFileService $fileService)
  {
    $this->_patente = $patente;
    $this->_fileService = $fileService;
  }

  public function index(int $skip = 0, int $take = 10)
  {
    return $this->_patente->skip($skip)->take($take)->get();
  }
  
  public function store(PatenteRequest $_patente)
  {
    $this->_patente->create([
      'nome' => $_patente->nome,
      'area_economica' => $_patente->area_economica,
      'area_cientifica' => $_patente->area_cientifica,
      'sinopse' => $_patente->sinopse,
      'pct' => $_patente->pct,
      'solucao' => $_patente->solucao,
      'inpi' => $_patente->inpi,
      'resumo' => $_patente->resumo,
      'problema' => $_patente->problema,
      'vantagem' => $_patente->vantagem,
      'aplicacao' => $_patente->aplicacao,
      'trl' => $_patente->trl,
      'telefone' => $_patente->telefone,
      'email' => $_patente->email,
      'colaborador' => $_patente->colaborador,
      'data_criacao' => $_patente->data_criacao,
      'links' => $_patente->links,
      'criadores' => $_patente->criadores,
      'palavra_chave' => $_patente->palavra_chave,
    ]);

    $this->_fileService->imageStorage($_patente->image, 'patente');
    $this->_fileService->videoStorage($_patente->video, 'patente');
    $this->_fileService->pdfStorage($_patente->pdf, 'patente');
    
    $this->_patente->save();
  }

  public function show(int $id)
  {
    return $this->_patente->find($id)->json();
  }

  public function update(PatenteRequest $_patente)
  {
      $patente =  Patente::findOrFail($_patente->id);
      
      $patente->_patente->update([
      'nome' => $_patente->nome,
      'area_economica' => $_patente->area_economica,
      'area_cientifica' => $_patente->area_cientifica,
      'sinopse' => $_patente->sinopse,
      'pct' => $_patente->pct,
      'solucao' => $_patente->solucao,
      'inpi' => $_patente->inpi,
      'resumo' => $_patente->resumo,
      'problema' => $_patente->problema,
      'vantagem' => $_patente->vantagem,
      'aplicacao' => $_patente->aplicacao,
      'trl' => $_patente->trl,
      'telefone' => $_patente->telefone,
      'email' => $_patente->email,
      'colaborador' => $_patente->colaborador,
      'data_criacao' => $_patente->data_criacao,
      'links' => $_patente->links,
      'criadores' => $_patente->criadores,
      'palavra_chave' => $_patente->palavra_chave,
    ]);

    $this->_fileService->imageStorage($_patente->image, 'patente');
    $this->_fileService->videoStorage($_patente->video, 'patente');
    $this->_fileService->pdfStorage($_patente->pdf, 'patente');
    
    $this->_patente->update();
  }

  public function destroy(int $id)
  {
    return $this->_patente->find($id)->delete();
  }
}