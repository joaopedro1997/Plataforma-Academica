<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $table = 'projetos';
    public $timestamps= false;
    Protected $fillable = [
        'id',
        'id_post',
        'id_user',
        'lider'
    ];
}
