<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';
    public $timestamps= false;

    Protected $fillable = [
        'id',
        'id_post',
        'path'
    ];


}
