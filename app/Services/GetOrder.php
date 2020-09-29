<?php namespace App\Services;

use App\Transactions\Paypal\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

class GetOrder
{
    
    public static function getOrder($orderId)
    {
        $client = PayPalClient::client();

        $response = $client->execute(new OrdersGetRequest($orderId));

        print "Status Code: {$response->statusCode}\n";
        print "Status: {$response->result->status}\n";
        print "Order ID: {$response->result->id}\n";
        print "Intent: {$response->result->intent}\n";
        print "Links:\n";

        foreach($response->result->links as $link)
        {
          print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
        }

        print "Gross Amount: {$response->result->purchase_units[0]->amount->currency_code} {$response->result->purchase_units[0]->amount->value}\n";

        return $response;

    }
}
