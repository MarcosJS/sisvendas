<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    protected $fillable = ['nomefuncao', 'nivel'];

    public function usuarios() {
        return $this->hasMany('App\Usuario');
    }
}
