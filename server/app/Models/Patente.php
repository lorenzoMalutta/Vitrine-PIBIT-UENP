<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patente extends Model
{
  use HasFactory;

  protected $table = 'patentes';

  protected $connection = 'mysql';

  protected $guarded = [];

  protected $fillable = [
    'nome',
    'sinopse',
    'pct',
    'inpi',
    'resumo',
    'problema',
    'vantagem',
    'aplicacao',
    'trl',
    'telefone',
    'email',
    'colaborador',
    'data_criacao',
    'links',
    'criadores',
    'area_cientifica',
    'area_economica',
    'palavra_chave',
  ];

  // public function midia()
  // {
  //   return $this->hasMany(Midia::class);
  // }
}
