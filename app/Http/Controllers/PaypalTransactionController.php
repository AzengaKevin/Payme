<?php

namespace App\Http\Controllers;

use App\Services\GetOrder;
use Illuminate\Http\Request;
use App\Services\CreateOrder;
use App\Services\CaptureOrder;

class PaypalTransactionController extends Controller
{
    
    public function setUpTransaction(Request $request){

        $createOrderResponse = CreateOrder::createOrder(true);

        GetOrder::getOrder($createOrderResponse->result->id);

        return redirect($createOrderResponse->result->links[1]->href);

    }

    public function captureTransaction(Request $request)
    {
        $data = $request->validate([
            'token' => ['required'],
            'PayerID' => ['required']
        ]);

        dd(CaptureOrder::captureOrder($data['token'], true));

    }

}
