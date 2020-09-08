<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    Protected $fillable = [
        'id',
        'title',
        'body',
        'author',
        'rate',
        'available',
        'vinculo_user_name',
        'vinculo_user_id',
        'collegiate',
        'id_author'
    ];

    public function arquivos()
    {
        return $this->hasMany(Files::class, 'id_post', 'id');
    }

    public function arquivosReco()
    {
        return $this->hasMany(recomendacao::class, 'id_post', 'id');
    }

    public function userss()
    {
        return $this->hasMany(User::class, 'id', 'id_author');
    }

}
