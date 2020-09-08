<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compentes_projetos extends Model
{
    protected $table = 'compentes_projetos';
    public $timestamps= false;
    Protected $fillable = [
        'id',
        'id_projeto',
        'id_post',
        'id_user',
    ];
}
