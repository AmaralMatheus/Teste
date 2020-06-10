<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
  public function vendas()
  {
    return $this->hasMany(Venda::class);
  }
}
