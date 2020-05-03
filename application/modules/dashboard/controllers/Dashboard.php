<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Dashboard Controller for currency crud
 * 
 */

class Dashboard extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library("currency_service");
    }

	/*
	* Function to load currency page and get all active currency exchange rates data
	*
	* @return mixed 
	*/
    public function index()
    {
    	isAuthorized();
    	$data['results'] = $this->currency_model->retrieveAllCurrencyRates();
    	$data['newCurrencies'] = getNewCurrencies();
    	renderTemplate('dashboard/index', $data);
    }

    /*
	* Function Create New currency
	*
	*/
    public function create()
    {
        $response = $this->currency_service->createAction($this->input->post());

        if ($response) {
            $this->session->set_flashdata('flashSuccess', 'Added New Currency successfully');
        } else {
            $this->session->set_flashdata('flashError', 'Add New Currency failed');
        }

        redirect('/dashboard');
    }

 	/*
	* Fuction to Update of existing currency
	*
	*/
    public function update()
    {
    	$response = $this->currency_service->updateAction($this->input->post());

        if ($response) {
            $this->session->set_flashdata('flashSuccess', 'Updated Existing Currency Exchange Rate successfully');
        } else {
            $this->session->set_flashdata('flashError', 'Updated Existing Currency failed');
        }

        redirect('/dashboard');
    }

	/*
	* Function to Update all currency exchange rates
	*
	*/
    public function updateAllCurrencies()
    {
    	$response = $this->currency_service->updateAllCurrenciesAction();

        if ($response) {
            $this->session->set_flashdata('flashSuccess', 'Updated All Existing Currencies Exchange Rate successfully');
        } else {
            $this->session->set_flashdata('flashError', 'Updated Existing Currencies Exchange Rate failed');
        }

        redirect('/dashboard');
    }
    
}