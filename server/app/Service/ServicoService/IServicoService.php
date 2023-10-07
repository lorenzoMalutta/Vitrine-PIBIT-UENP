<?php
namespace App\Service\ServicoService;

use App\Http\Requests\ServicoRequest;

interface IServicoService {
    public function getAll(int $skip = 0, int $take = 10);
    public function getById(int $id);
    public function create(ServicoRequest $request);
    public function update(ServicoRequest $request, int $id);
    public function delete(int $id);
}
