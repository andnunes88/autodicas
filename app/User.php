<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado_id',
        'cidade_id',
        'name',
        'email',
        'password',
        'admin',
        'telefone',
        'cpf',
        'cnpj',
        'cep',        
        'endereco',
        'usuario_slug',
        'usuario_imagem'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function cidade()
    {
        return $this->belongsTo('App\Cidade');
    }

    public function anuncios()
    {
        return $this->hasMany('App\Anuncio','usuario_id');
    }

}