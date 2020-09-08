<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recomendacao extends Model
{
    protected $table = 'recomendacaos';
    public $timestamps= false;
    Protected $fillable = [
        'id',
        'id_professor',
        'id_post',
        'id_destino'
    ];

    public function recomendacaoPost()
    {
        return $this->hasMany(Post::class, 'id', 'id_post');
    }

    public function recomendacaoUser()
    {
        return $this->hasMany(User::class, 'id', 'id_professor');
    }

}
