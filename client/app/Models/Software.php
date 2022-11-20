<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
  use HasFactory;

  protected $table = 'softwares';

  protected $connection = 'mysql';

  protected $guarded = [];

  protected $fillLabel = [];

  public function midia()
  {
    return $this->hasMany(Midia::class);
  }
}
