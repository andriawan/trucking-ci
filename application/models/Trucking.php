<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trucking extends MY_Model {

	protected $_table = "service_category";

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		$this->as_array();
		return $this->get_all();
	}

	public function getBy()
	{
		$parameter = $this->input->post('id_service');
		return $this->db->where(array('id_service' => $parameter))->get($this->_table)->result_array();

	}

}

/* End of file Trucking.php */
/* Location: ./application/models/Trucking.php */