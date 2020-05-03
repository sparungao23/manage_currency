<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Currency_model.
 * Includes crud for currency
 */
class Currency_model extends My_Model {

    private $currency_rates_table = "currency_rates";

    public function __construct()
    {
        parent::__construct();
    }

    /*
    * Get all active currency
    *
    * @return array
    */
    public function retrieveAllCurrencyRates()
    {
        $obj = new stdClass();
        $obj->is_active = 1;
        return $this->fetch_all_where($this->currency_rates_table,$obj);
    }
    
    /*
    * Get currency per Id
    *
    * @param int $id
    *
    * @return array
    */
    public function retrieveCurrencyRateById($id)
    {
    	return $this->fetch_using_id($id, $this->currency_rates_table);
    }

    /*
    * Insert new currency
    *
    * @param array $array
    *
    * @return boolean
    */
    public function insertCurrencyRate($array)
    {
        return $this->insert($this->currency_rates_table, $array);
    }

    /*
    * Update existing currency by Id
    *
    * @param int $id
    * @param array $array
    *
    * @return boolean
    */
    public function updateCurrencyRate($id,$array)
    {
        $obj = new stdClass();
        $obj->key = "id";
        $obj->value = $id;
        $obj->table = $this->currency_rates_table;
        $obj->array = $array;
        return $this->update($obj);
    }

}