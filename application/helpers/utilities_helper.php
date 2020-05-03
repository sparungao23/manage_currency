<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists("renderTemplate")) {
	/*
	* helper function to load template 
	* @param string $page
	* @param array $data
	*
	*/
    function renderTemplate($page,$data=null) {
        $ci =& get_instance();
        $ci->load->view("layout/header",$data);
        $ci->load->view($page,$data);
        $ci->load->view("layout/footer",$data);
    }
}



if(!function_exists("isAuthorized")) {

    /**
     * @name isAuthorized
     * @desc Check users current login state
     * @param string $module
     * @return none
     */
    function isAuthorized() {
    	$ci =& get_instance();
        $ci->load->library('session');
        //Check if user is not logged in
        if (!$ci->session->userdata('isLoggedIn')) {
            $redirect = current_url();//$_SERVER['REQUEST_URI'];
            redirect(site_url()."?redirect=".$redirect);
            exit;
        }
    }
}        

if(!function_exists("getNewCurrencies")) {

    /**
     * @name getNewCurrencies
     * @desc Get all new currency that is not existing on the database
     *
     * @return array
     */
    function getNewCurrencies()
    {
    	$ci =& get_instance();

		$ci->load->model("currency_model");
		$currencies = $ci->currency_model->retrieveAllCurrencyRates();

    	$exchangeRates = getCurrencyRatesUsingThirdPartyAPI(config_item('xr_url'));
    	$data['currencies']  = $exchangeRates['rates'];

    	if (!empty($currencies)) {
			$existingCurrencies = [];
	    	foreach($currencies as $currency):
	    		$existingCurrencies[$currency->currency] = $currency->rate;
	    	endforeach;
    	}

    	$newCurrencies = [];
    	foreach($data['currencies'] as $key => $currency):
    		if(empty($currencies)) {
    			$newCurrencies[$key] = $currency;
    		} else if(!array_key_exists($key, $existingCurrencies)) {
    			$newCurrencies[$key] = $currency;
    		}
    	endforeach;

    	return $newCurrencies;
    }
} 


if(!function_exists("getCurrencyRatesUsingThirdPartyAPI")) {

	 /**
     * @name getCurrencyRatesUsingThirdPartyAPI
     * @desc Get all currency rates using Third Party API
     *
     * @return array
     */
    function getCurrencyRatesUsingThirdPartyAPI($url)
    {
    	return json_decode(file_get_contents($url), true);
    }
}
