<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function quality()
    {
        return $this->belongsTo(Quality::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

}
