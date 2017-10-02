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
		$filename = 'DownloadReport';
		$table    = $this->input->post('html');

		//https://stackoverflow.com/questions/24048291/how-to-export-html-table-to-excel-using-phpexcel

		// save $table inside temporary file that will be deleted later
		$tmpfile = tempnam(sys_get_temp_dir(), 'html');
		file_put_contents($tmpfile, $table);

		// insert $table into $objPHPExcel's Active Sheet through $excelHTMLReader
		$objPHPExcel     = new PHPExcel();
		$excelHTMLReader = PHPExcel_IOFactory::createReader('HTML');
		$excelHTMLReader->loadIntoExisting($tmpfile, $objPHPExcel);
		$objPHPExcel->getActiveSheet()->setTitle($filename); // Change sheet's title if you want
		
		foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
		        $objPHPExcel->getActiveSheet()
		                ->getColumnDimension($col)
		                ->setAutoSize(true);

		        $objPHPExcel->getActiveSheet()->getRowDimension(12)->setRowHeight(-1); 

		        $objPHPExcel->getActiveSheet()
				        ->getStyle($col)
				        ->getAlignment()
				        ->setWrapText(true);

    	}

		unlink($tmpfile); // delete temporary file because it isn't needed anymore

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // header for .xlxs file
		header('Content-Disposition: attachment;filename="'. $filename . '.xlsx"'); // specify the download file name
		header('Cache-Control: max-age=0');

		// Creates a writer to output the $objPHPExcel's content
		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_start();
		$writer->save('php://output');
		$xlsData = ob_get_contents();
		ob_end_clean();

		$response =  array(
		        'op' => 'ok',
		        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
		    );

		die(json_encode($response));
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