<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

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

    public function file()
    {
        return $this->belongsTo(File::class);
    }


    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }


    public static function boot()
    {
        parent::boot();

        self::deleting(function (Order $order) {

            if ($order->transaction) {
                $order->transaction->delete();
            }

            if ($order->ticket) {
                if ($order->ticket->messages()) {
                    $messages = $order->ticket->messages()->get();
                    foreach ($messages as $message) {
                        $message->delete();
                    }
                }
            }

            if ($order->ticket) {
                $order->ticket->delete();
            }

        });
        self::restoring(function (Order $order) {
            if ($order->transaction()->withTrashed()->first()) {
                $order->transaction()->withTrashed()->first()->restore();
            }
            if ($order->ticket()->withTrashed()->first()) {
                $order->ticket()->withTrashed()->first()->restore();
            }
            if ($order->ticket) {
                if ($order->ticket()->withTrashed()->first()->messages()->withTrashed()->first()) {

                    $messages = $order->ticket()->withTrashed()->first()->messages()->withTrashed()->get();
                    foreach ($messages as $message) {
                        $message->restore();
                    }

                }
            }

        });
    }


}
