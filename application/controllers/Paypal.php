



<!--------------------------------file Added by Ahmed -----------------------  -->
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

class Paypal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the PayPal SDK
        $this->load->config('paypal');
    }

    public function pay()
    {
        // PayPal setup
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // Item setup
        $item = new Item();
        $item->setName('Test Item')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(10);  // Set item price

        $itemList = new ItemList();
        $itemList->setItems(array($item));

        // Amount setup
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(10);

        // Transaction setup
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Test Payment');

        // Redirect URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(base_url('paypal/success'))
            ->setCancelUrl(base_url('paypal/cancel'));

        // Payment setup
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_apiContext());

            // Redirect the user to PayPal
            header("Location: " . $payment->getApprovalLink());
            exit();
        } catch (Exception $ex) {
            // Handle error
            echo $ex->getMessage();
            exit(1);
        }
    }

    private function _apiContext()
    {
        // Set up PayPal API context
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $this->config->item('paypal_client_id'),
                $this->config->item('paypal_secret')
            )
        );

        // Optional sandbox mode
        $apiContext->setConfig(
            array(
                'mode' => $this->config->item('paypal_sandbox') ? 'sandbox' : 'live'
            )
        );

        return $apiContext;
    }

    public function success()
    {
        // Handle payment success
        echo 'Payment successful';
    }

    public function cancel()
    {
        // Handle payment cancellation
        echo 'Payment cancelled';
    }
}
