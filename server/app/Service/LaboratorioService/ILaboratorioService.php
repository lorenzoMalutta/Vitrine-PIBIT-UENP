<?php

namespace App\Service\LaboratorioService;
use App\Models\Laboratorio;

interface  ILaboratorioService {
    public function getAll(int $skip = 0, int $take = 10);
    public function getById(int $id);
    public function create(Laboratorio $request);
    public function update(Laboratorio $request, int $id);
    public function delete(int $id);
}