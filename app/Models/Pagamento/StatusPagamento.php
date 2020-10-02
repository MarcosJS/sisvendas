<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPagamento extends Model
{
    use HasFactory;

    protected $fillable = ['nomestatus'];

    public function pagamentos() {
        return $this->hasMany('App\Models\Pagamento\Pagamento');
    }
}
