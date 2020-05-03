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
        $sql = "Select * from ".$this->currency_rates_table." WHERE is_active=1 order by currency ASC";
      	$query = $this->db->query($sql);
		return $query->result();
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
    * Get currency per Id
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
    * Get currency per Id
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