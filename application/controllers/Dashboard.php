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
		$this->load->model('Trucking','trucking');
		$this->trucking->showData();
	}

	public function input()
	{
		$this->load->view('user/form');
	}

	public function getCategory()
	{
		$this->load->model('Trucking','trucking');
		$obj = $this->trucking->getAllCategory();
		echo json_encode($obj);
	}

	public function getby()
	{
		$this->load->model('Trucking','trucking');
		$obj = $this->trucking->getByCategory();
		echo json_encode($obj);
	}

	public function submitData()
	{
		$this->load->model('Trucking','trucking');
		// debug($this->input->post());
		// debug($this->session->userdata());
		$this->trucking->processData();
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */