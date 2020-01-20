<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URLShortener extends Model
{
    //
    public function getShortUrlAttribute($value)
    {
       return env('APP_URL').'/'.$value;
    }
}
