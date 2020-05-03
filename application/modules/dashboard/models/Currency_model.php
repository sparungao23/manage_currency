<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Currency_model extends My_Model {

    private $currency_rates_table = "currency_rates";

    public function __construct()
    {
        parent::__construct();
    }

    public function retrieveAllCurrencyRates()
    {
        $sql = "Select * from ".$this->currency_rates_table." WHERE is_active=1 order by currency ASC";
      	$query = $this->db->query($sql);
		return $query->result();
    }
    
    public function retrieveCurrencyRateById($id)
    {
    	return $this->fetch_using_id($id, $this->currency_rates_table);
    }

    public function insertCurrencyRate($array)
    {
        return $this->insert($this->currency_rates_table, $array);
    }

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