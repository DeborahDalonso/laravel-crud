<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    //Por padrão, criar essa função com o nome da tabela relacionada
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
