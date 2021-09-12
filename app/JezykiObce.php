<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JezykiObce extends Model
{
    protected $table = 'jezyki_obce';

    public function jezyki_obce()
    {
        return $this->belongsTo('App\UserJezykiObce', 'jezyki_obce_id');
    }
    public function jezyki_obce_cv()
    {
        return $this->belongsTo('App\UserJezykiObceCV', 'jezyki_obce_id');
    }
}