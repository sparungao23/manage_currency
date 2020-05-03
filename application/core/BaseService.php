<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This is the base services used in all Modules
 * You will find services under 'libraries' folder for each modules
 * @access public
 */
class BaseService {
	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
	}
}
