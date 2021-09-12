<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserJezykiObce extends Model
{
    public $timestamps = false;
    protected $table = 'jezyki_obce_user';

    public function jezyki_obce()
    {
        return $this->hasOne('App\JezykiObce', 'id', 'jezyki_obce_id');
    }
}