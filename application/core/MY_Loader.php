<?php
/**
 * PlantMiner Web Application
 *
 * @package Application\Core
 * @author PlantMiner Dev Team
 * @copyright Copyright (c) 2013 - 2015, MinerGroup
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader 
{
	public function __construct() 
	{
		parent::__construct();
	}
}
