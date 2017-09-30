<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ionAuthCheck();
	}

	public function index()
	{
		$this->load->view('admin/dashboard');
	}

	public function input()
	{
		$this->load->view('user/form');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */