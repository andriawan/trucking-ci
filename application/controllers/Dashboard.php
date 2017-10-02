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

	public function tester()
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getActiveSheet()->setTitle('ReceivedMessages');
		header('Content-Type: application/vnd.ms-excel');
		$file_name = "kpi_form_".date("Y-m-d_H:i:s").".xls";
		header("Content-Disposition: attachment; filename=$file_name");
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
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

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */