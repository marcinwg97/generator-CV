<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserJezykiObceCV extends Model
{
    public $timestamps = false;
    protected $table = 'jezyki_obce_user_cv';

    public function jezyki_obce_cv()
    {
        return $this->hasOne('App\JezykiObce', 'id', 'jezyki_obce_id');
    }
}