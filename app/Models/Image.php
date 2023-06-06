<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    //Lembre que o chave extrangeira ja vem pelo relacionamento
    protected $fillable = ['image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
