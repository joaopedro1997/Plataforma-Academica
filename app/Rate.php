<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';

    Protected $fillable = [
        'id_post',
        'id_user',
        'id_like'
    ];
}
