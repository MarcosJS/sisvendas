<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusVenda extends Model
{
    use HasFactory;

    protected $fillable = ['nomestatus'];

    public function vendas() {
        return $this->hasMany('App\Models\Venda');
    }
}
