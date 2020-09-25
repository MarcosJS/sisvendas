<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    protected $fillable = ['nomefuncao', 'nivel'];

    public function usuarios() {
        return $this->hasMany('App\Models\Usuario');
    }
}
