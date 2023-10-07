<?php
namespace App\Service\PesquisaService;

use App\Models\Pesquisa;

interface IPesquisaService {
    public function getAll(int $skip = 0, int $take = 10);
    public function getById(int $id);
    public function create(Pesquisa $request);
    public function update(Pesquisa $request, int $id);
    public function delete(int $id);
}
