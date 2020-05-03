<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 */
class Login extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login_model');
    }

    public function index()
    {
        $data['title'] = 'Signin';

        $this->form_validation->set_rules('email', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login', $data);
        } else {
            redirect();
        }
    }

    public function processLogin()
    {
        $this->form_validation->set_rules('email', 'Email','required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
            
        if($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
                
            $result = $this->login_model->loginMe($email, $password);
            if(!empty($result))
            {
                $sessionArray = [
                    'user_id'=>$result->id,                    
                    'user_role'=>$result->user_role,
                    'email'=>$result->email,
                    'isLoggedIn' => TRUE
                ];
                                  
                $this->session->set_userdata($sessionArray);
                redirect('/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                redirect('/login');
            }
        }    
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("login");
    }

}