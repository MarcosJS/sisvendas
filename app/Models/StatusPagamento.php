<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPagamento extends Model
{
    use HasFactory;

    protected $fillable = ['nomestatuspagamento'];

    public function vendas() {
        return $this->hasMany('App\Models\Venda');
    }
}
