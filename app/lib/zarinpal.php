<?php

namespace App\lib;

use DB;
/*require_once 'nusoap.php';*/

use nusoap_client;

class zarinpal
{
    public $MerchantID;

    public function __construct()
    {
        $this->MerchantID = "416137cc-2f9e-11e9-9245-005056a205be";
    }

    public function pay($Amount, $Email, $Mobile,$CallbackURL)
    {
        $Description = 'سفارش ترجمه';  // Required



//        $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        $client = new nusoap_client('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl','wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PaymentRequest', [
            [
                'MerchantID' => $this->MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ],
        ]);

        //Redirect to URL You can do it also by creating a form
        if ($result['Status'] == 100) {
            return $result['Authority'];
        } else {
            return false;
        }


    }

}
