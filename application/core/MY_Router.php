<?php
/**
 * PlantMiner Web Application
 *
 * @package Application\Core
 * @author PlantMiner Dev Team
 * @copyright Copyright (c) 2013 - 2015, MinerGroup
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH."third_party/MX/Router.php";

class MY_Router extends MX_Router
{

	public static $data;

	private $db = null;
	private $custom_route = false;
	private $new_segments = array();
	private $_is = null;
	private $_data = array();

	public function is($is=null)
	{
		if ($is) {
			if ($is==$this->_is) return true;
			return false;
		}
		return $this->_is;
	}

	public function data()
	{
		return $this->_data;
	}

	public function routed_segments()
	{
		return $this->new_segments;
	}

	private function getDBInstance()
	{
		if (!$this->db) {
			if (!class_exists('CI_DB'))

				require_once(BASEPATH . 'database/DB.php');
				require_once(APPPATH . 'config/database.php');
				$params = $db[$active_group];
				$this->db =& DB($params, $query_builder);
		}
	}
}
