<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslateFile extends Model
{

    protected $guarded=[];

    public function order(){

        return $this->hasOne(Order::class);

    }

}
