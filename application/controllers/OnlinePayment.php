<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use SumUp\SumUp;
use SumUp\Exceptions\SumUpSDKException;


class OnlinePayment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Europe/London');
		$this->load->model('Index_Model');
		$this->load->helper('cookie');
		$this->load->helper('custom_helper');
		$this->load->model('Review_Model');
		$this->load->config('fleet_data'); 
		  $this->fleet_data = $this->config->item('fleet_data'); // Get the data from the config file
	}

    public function index() {
    
        $this->load->view('onlinepayment');
    }



    public function create_checkout()
    {
        try {
	 debug_log(" -----inside create_checkout  function  --------- ");
            $sumup = new SumUp([
                'app_id'     =>'AIzaSyBd6AQCrQBjsP5I9KMXGVUVWhJJeQet3C4',
                'app_secret' =>'AIzaSyBd6AQCrQBjsP5I9KMXGVUVWhJJeQet3C4',
                'code'       =>'AIzaSyBd6AQCrQBjsP5I9KMXGVUVWhJJeQet3C4',
            ]);
	 debug_log(" 11111111111111111111111111111 ");
            $checkoutService = $sumup->getCheckoutService();

            $response = $checkoutService->create(
                25.00, // amount
                'EUR',
                'ORDER-1001',
                getenv('SUMUP_MERCHANT_CODE'),
                'Online payment via card widget',
                getenv('SUMUP_PAY_TO_EMAIL')
            );

            $checkout = json_decode($response->getBody(), true);

            echo json_encode([
                'status' => 'success',
                'checkout_id' => $checkout['id']
            ]);

        } catch (SumUpSDKException $e) {
             debug_log("errrrrrrr");
 debug_log($e);

            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

}
?>
