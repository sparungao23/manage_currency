<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class Currency_service.
* Includes all business logic for currency crud
*
*/

class Currency_service extends BaseService
{
	public $ci;

	public function __construct()
	{
		parent::__construct();
		$this->ci =& get_instance();
		$this->ci->load->model('currency_model');
	}

	/*
	*
	* @param array $request
	*
	* @return boolean 
	*/
	public function createAction($request)
	{
		$currency = $this->ci->security->xss_clean($request["ddCurrency"]);
        $currency = explode("|", $currency);

        $currencyData = [
        	'currency' => isset($currency[0]) ? $currency[0] : '',
            'rate' => isset($currency[1]) ? $currency[1] : '',
            'created_by_user_id' => $this->ci->session->userdata['user_id']
        ];

        return $this->ci->currency_model->insertCurrencyRate($currencyData);
	}

	/*
	* @param array $request
	*
	* @return boolean 
	*/
	public function updateAction($request)
	{

		$currency = $this->ci->currency_model->retrieveCurrencyRateById($request['hdCurrencyId']);
		$exchangeRates = getCurrencyRatesUsingThirdPartyAPI(config_item('xr_url'));

		$rate = 0;
		if (array_key_exists($currency->currency, $exchangeRates['rates'])) {
			$rate = $exchangeRates['rates'][$currency->currency];
		}

		$currencyData = [
			'rate' => $rate,
			'updated_at' => date('Y-m-d H:i:s')
		];
        return $this->ci->currency_model->updateCurrencyRate($request['hdCurrencyId'],$currencyData);
	}

	/*
	* @param array $request
	*
	* @return boolean 
	*/
	public function updateAllCurrenciesAction()
	{
		$existingCurrencies = $this->ci->currency_model->retrieveAllCurrencyRates();
		$exchangeRates = getCurrencyRatesUsingThirdPartyAPI(config_item('xr_url'));

		$this->ci->db->trans_start();

			foreach($existingCurrencies as $currency):
				$rate = 0;
				if (array_key_exists($currency->currency, $exchangeRates['rates'])) {
					$rate = $exchangeRates['rates'][$currency->currency];

					$currencyData = [
						'rate' => $rate,
						'updated_at' => date('Y-m-d H:i:s')
					];

					$this->ci->currency_model->updateCurrencyRate($currency->id,$currencyData);
				}		
			endforeach;

		return $this->ci->db->trans_complete();
	}

}