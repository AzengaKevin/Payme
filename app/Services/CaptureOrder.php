<?php namespace App\Services;

use App\Transactions\Paypal\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class CaptureOrder
{
    
    public static function captureOrder($orderId, $debug=false)
    {
        $request = new OrdersCaptureRequest($orderId);

        // 3. Call PayPal to capture an authorization
        $client = PayPalClient::client();
        $response = $client->execute($request);
        // 4. Save the capture ID to your database. Implement logic to save capture to your database for future reference.
        if ($debug)
        {
          print "Status Code: {$response->statusCode}\n";
          print "Status: {$response->result->status}\n";
          print "Order ID: {$response->result->id}\n";
          print "Links:\n";
          foreach($response->result->links as $link)
          {
            print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
          }
          print "Capture Ids:\n";
          foreach($response->result->purchase_units as $purchase_unit)
          {
            foreach($purchase_unit->payments->captures as $capture)
            {   
              print "\t{$capture->id}";
            }
          }
          // To print the whole response body, uncomment the following line
          // echo json_encode($response->result, JSON_PRETTY_PRINT);
        }
    
        return $response;        
    }
}
