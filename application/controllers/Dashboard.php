<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->tables  = $this->config->item('tables', 'ion_auth');
	}

	public function index()
	{
		if (!$this->ion_auth->is_admin()){
			redirect('dashboard/input','refresh');
		}

		$this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->showData();
	}

	public function adduser()
	{
		$this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->showAddUser();
	}

	public function submitUser()
	{
		$this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->processAddUser();
	}

	public function tester()
	{
	}

	public function exportExcel()
	{	
		$this->load->model('Trucking','trucking');
		$this->trucking->exportExcel();
	}

	public function exportPDF()
	{	
		$this->load->model('Trucking','trucking');
		$this->trucking->exportPDF();
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

	public function edit()
	{
		$this->load->model('Trucking','trucking');
		$this->trucking->processData();	
	}

	public function daftar_list()
	{
		$this->load->model('Trucking','trucking');
		$this->trucking->showSingleUser();
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */