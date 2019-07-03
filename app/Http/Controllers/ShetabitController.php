<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Invoice;

class ShetabitController extends Controller
{
    public function test()
    {

        $invoice = new Invoice;

        $invoice->amount(1000);

        return Payment::purchase($invoice, function ($driver, $transactionId) {

        })->pay();

    }
}
