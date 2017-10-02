<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trucking extends MY_Model {

	protected $_table = "trucking_transaction";

	// global error array
	protected $error = array();
	// global class data array
	protected $data = array();

	public function __construct()
	{
		parent::__construct();
		
	}

	public function ShowUserData($value='')
	{
		$this->load->view('admin/dashboard', $query);
		
	}

	public function ShowAdminData($value='')
	{
		# code...
	}

	public function getAllCategory()
	{
		return $this->db->get('service_category')->result_array();
	}

	public function showData()
	{
		$this->db->select('*');
		$this->db->from('trucking_service_transaction');
		$this->db->join(
			'trucking_transaction', 'trucking_service_transaction.id_transaction = trucking_transaction.id_transaction');
		$this->db->join(
			'service_category', 'trucking_service_transaction.id_service = service_category.id_service');
		$this->db->order_by('trucking_transaction.service_date', 'DESC');
		$query['query'] = $this->db->get()->result_array();
		$query['unique'] = unique_multidim_array($query['query'],'id_transaction');
		$this->load->view('admin/dashboard', $query);
	}

	public function getByCategory()
	{
		$parameter = $this->input->post('id_service');
		return $this->db->where(array('id_service' => $parameter))->get('service_category')->result_array();

	}

	public function processData()
	{
		// debug($this->input->post());
		// data untuk transaksi

		if ($this->input->post('countItemServiceList') == 0 || $this->input->post('sum-total') == 0) {

			$this->session->set_flashdata('error', 'Silahkan isi item list anda');
			redirect('dashboard/input','refresh');
		}

		$data = array(

			'car_number' => $this->input->post('car-number'),
			'stnk_date' => make_sql_date_time($this->input->post('stnk-date')),
			'pkb_date' => make_sql_date_time($this->input->post('pkb-date')),
			'service_date' => make_sql_date_time($this->input->post('service-date')),
			'kir_date' => make_sql_date_time($this->input->post('kir-date')),
			'sipa_date' => make_sql_date_time($this->input->post('sipa-date')),
			'ibm_date' => make_sql_date_time($this->input->post('ibm-date')),

		);

		// data transaksi category full
		$items = array();
		for ($i=0; $i < $this->input->post('countItemServiceList'); $i++) { 
			$items[$i] = $this->input->post('item-service' . $i);
		}

		// debug($items);
		// return;

		$this->validate =  array(

	        array(
	                'field' => 'car-number',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'stnk-date',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'pkb-date',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'service-date',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'kir-date',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'sipa-date',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'ibm-date',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'sum-total',
	                'rules' => 'required|numeric',
	        ),
	        array(
	                'field' => 'item-service0',
	                'rules' => 'required|numeric|greater_than[0]',
	        )
	    );


	    if ($this->validate($data) == FALSE) {

			$this->data['message'] = validation_errors();

            $this->data['car_number'] = array(
                'name'  => 'car-number',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('car-number'),
            );
            $this->data['stnk_date'] = array(
                'name'  => 'stnk-date',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('stnk-date'),
            );
            $this->data['pkb_date'] = array(
                'name'  => 'pkb-date',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('pkb-date'),
            );
            $this->data['service_date'] = array(
                'name'  => 'service-date',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('service-date'),
            );
            $this->data['kir_date'] = array(
                'name'  => 'kir-date',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('kir-date'),
            );
            $this->data['sipa_date'] = array(
                'name'  => 'sipa-date',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('sipa-date'),
            );
            $this->data['ibm_date'] = array(
                'name'  => 'ibm-date',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('ibm-date'),
            );

            $this->data['item-service0'] = array(
                'name'  => 'item-service0',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('item-service0'),
            );

            $dataResult['data'] = $this->data;

            $this->load->view('components/common/header');
            $this->load->view('components/common/flash-message');
            $this->load->view('user/navbar');
            $this->load->view('user/sidebar');
            $this->load->view('user/content',$dataResult);
            $this->load->view('components/common/footer');

	    }else{
	    	
	    	if ($this->session->userdata('user_id') != null) {

	    		$this->db->query('LOCK TABLE trucking_transaction WRITE');

				$id = $this->insert($data);

				$this->db->query('UNLOCK TABLES');

				for ($i = 0; $this->input->post('countItemServiceList') > $i ; $i++) { 

					$this->db->insert('trucking_service_transaction', array(
							'id_transaction' => $id,
							'id_service' => $items[$i],
							'total_price' => $this->input->post('sum-total')
						 )
					);

				}
				
				$this->session->set_flashdata('sukses', 'Data berhasil di Input');
				redirect('dashboard/input','refresh');		

			}else{
				$this->session->set_flashdata('error', 'Terjadi kesalahan');
				redirect('dashboard/auth/logout','refresh');
			}

	    }
        
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

	public function exportPDF()
	{
		$style = $this->load->view('components/common/table-render', '', TRUE);
		$table = $this->input->post('tb');
		$pdf = new Dompdf\Dompdf();
		$pdf->setPaper('A4', 'landscape');
		$pdf->load_html($style . $table);
		$pdf->render();
		
		$output = $pdf->output();
		file_put_contents("file.pdf", $output);

		echo json_encode(base_url('file.pdf'));


		// $dompdf = new Dompdf\Dompdf();
		// $dompdf->load_html('<h1>Test</h1>');
		// $output = $dompdf->output();
		// file_put_contents('filename.pdf', $output);	
	}

}

/* End of file Trucking.php */
/* Location: ./application/models/Trucking.php */