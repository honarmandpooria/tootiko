<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];


    public function order(){
        return $this->hasOne(Order::class);
    }


}
