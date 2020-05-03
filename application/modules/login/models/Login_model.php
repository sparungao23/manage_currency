<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{

	private $users_table = "users";

 	public function __construct() {
        parent::__construct();
    }

	/**
	 *
	 * This function used to check the login credentials of the user
	 * @param string $email : This is email of the user
	 * @param string $password : This is encrypted password of the user
	 */
	function loginMe($email, $password)
	{
	    $this->db->select('id,email,password,user_role,created_at,updated_at');
	    $this->db->from($this->users_table);
	    $this->db->where('email', $email);
	    $this->db->where('is_active', 1);
	    $query = $this->db->get();
	        
	    $user = $query->row();

	    if(!empty($user)){
	        if($this->verifyHashedPassword($password, $user->password)){
	            return $user;
	        } else {
	            return [];
	        }
	    } else {
	        return [];
	    }
	}

    public function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}
