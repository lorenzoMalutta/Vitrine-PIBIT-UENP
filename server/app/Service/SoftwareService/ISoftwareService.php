<?php
namespace App\Service\SoftwareService;

use App\Http\Requests\SoftwareRequest;

interface ISoftwareService
{
  function index(int $skip = 0, int $take = 10);
  function store(SoftwareRequest $patente);
  function show(int $id);
  function update(SoftwareRequest $patente);
  function destroy(int $id);
}