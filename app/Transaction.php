<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{

    protected $guarded = [];

    use SoftDeletes;


    public function order()
    {
        return $this->belongsTo(Order::class);
    }


}
