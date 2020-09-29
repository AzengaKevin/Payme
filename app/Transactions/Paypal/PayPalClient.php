<?php namespace App\Transactions\Paypal;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;

class PayPalClient
{
    
    /**
     * 
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     * 
     * @return PayPalHttpClient instance
     * 
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use ProductionEnvironment.
     * 
     * @return SandboxEnvironment|ProductionEnvironment the current paypal environment
     */
    public static function environment()
    {
        $clientId = "ARUXEnyQQp099Pqvt3FdRJhogIkZ2C-Tg8b_W6Haaf6GucRXwF0TPc4sl-JalmFSWYokVZqOb-ljTBmM";
        $clientSecret = "EGMU3dJxatbSqcCZ6E5j4hT874F9y1JQs5QAtj2nwJAYKMYSxr2HsePJ5_xyqKGGWI8ECJIOdE__QAJT";

        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
