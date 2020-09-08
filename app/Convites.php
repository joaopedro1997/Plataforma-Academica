<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convites extends Model
{
    protected $table = 'convites';
    Protected $fillable = [
        'id',
        'id_convite',
        'id_post',
        'id_origem',
        'id_destino',
    ];
    public function convites()
    {
        return $this->hasMany(Post::class, 'id', 'id_post');
    }
}
