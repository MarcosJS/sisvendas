<?php

namespace App\Models\Produto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composicao extends Model
{
    use HasFactory;

    public function itensComposicao() {
        return $this->hasMany('App\Models\Produto\ItemComposicao');
    }

    public function produto() {
        return $this->belongsTo('App\Models\Produto\Produto');
    }
}
