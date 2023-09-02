<?php
namespace App\Service\PatenteService;

use App\Http\Requests\PatenteRequest;

interface IPatenteService
{
  function index(int $skip = 0, int $take = 10);
  function store(PatenteRequest $patente);
  function show(int $id);
  function update(PatenteRequest $patente);
  function destroy(int $id);
}