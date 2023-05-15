<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $guarded = [

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    //da para fazer uma consulta select->('campos que eu quero'), assim em uma apliação monolito vc pega só o que quer

    //com esse cara vc define quem n aparece em uma consulta, é bom em api, numa aplicação monolito não é muito top não, pq vc pode acessar diretamente os valores
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $visible = [
        //'name' => aqui voce define o que vai aparecer, é o contrario do hidden
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'date:m/d/y', //formata todos os campos email_verified
        'is_blocked' => 'boolean' //passa todos os valores dos campos is_blocked de inteiro para booleano
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
