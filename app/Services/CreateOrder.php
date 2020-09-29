<?php namespace App\Services;

use App\Transactions\Paypal\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class CreateOrder
{
    public static function createOrder($debug = false)
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = self::buildRequestBody();

        $client = PayPalClient::client();

        $response = $client->execute($request);

        if ($debug)
        {
          print "Status Code: {$response->statusCode}\n";
          print "Status: {$response->result->status}\n";
          print "Order ID: {$response->result->id}\n";
          print "Intent: {$response->result->intent}\n";
          print "Links:\n";
          foreach($response->result->links as $link)
          {
            print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
          }
        }

        return $response;
    }  

    private static function buildRequestBody()
    {
        return array(
            'intent' => 'CAPTURE',
            'application_context' =>
                array(
                    'return_url' => route('paypal.capture'),
                    'cancel_url' => 'https://example.com/cancel'
                ),
            'purchase_units' =>
                array(
                    0 =>
                        array(
                            'amount' =>
                                array(
                                    'currency_code' => 'USD',
                                    'value' => '220.00'
                                )
                        )
                )
        );
    }
}
