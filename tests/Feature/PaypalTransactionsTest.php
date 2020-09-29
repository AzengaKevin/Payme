<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaypalTransactionsTest extends TestCase
{

    /**
     * @test
     * 
     * @group paypal
     */
    public function client_can_reach_the_set_up_route()
    {
        $this->withoutExceptionHandling();
        
        $response = $this->post('/paypal/setup-transaction');

    }
}
