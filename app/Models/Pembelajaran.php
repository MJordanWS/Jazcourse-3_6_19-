<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    protected $fillable = [
        'paketbelajar_id',
        'image',
        'name',
        'description',
    ];

    public function paketbelajar()
    {
        return $this->belongsTo(PaketBelajar::class);
    }
}
