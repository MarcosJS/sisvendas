<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero'
    ];

    public function pagamento() {
        return $this->belongsTo('App\Models\Pagamento\Pagamento');
    }
}
