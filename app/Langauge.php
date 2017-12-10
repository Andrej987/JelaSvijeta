<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Langauge extends Model
{
    protected $fillable = ['code','title'];

    protected $table = 'language';

    public function translate(){

        return $this->belongsTo(Translate::class);

    }

}
