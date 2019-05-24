<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public function order()
    {
        return $this->hasOne(Order::class);
    }


}
