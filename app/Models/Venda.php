<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
  public function vendedor()
  {
    return $this->belongsTo(Vendedor::class);
  }
}
