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

	public function page($page = null)
	{
		if ($page == null) {
			$page = 1;
		}
		$this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->showPaginationData($page);	
	}
	
	public function editmaster($id){
	    
	    $this->db->select('*');
	    $this->db->from('trucking_transaction');
	    $this->db->where('id_transaction',$id);
	    $query['query'] = $this->db->get()->result_array();
	    $query['unique'] = unique_multidim_array($query['query'],'id_transaction');
	   
	    
     	$this->load->view('admin/form',$query);
}


	
	public function servicedelet(){
	    $id=$this->uri->segment(3);
	    $this->db->where('id_service', $id);
        $result=$this->db->delete('service_category'); 
        
        if($result){
          
            redirect('dashboard/showS','refresh');
        }
	}

	function generate()
	{
		$s = generateInvoice();
		debug($s);
	}
	
	
	public function deletemaster(){

	    $id=$this->uri->segment(3);
	    $this->db->where('id_transaction', $id);
        $result= 	$this->db->delete('trucking_transaction'); 

        $this->db->where('id_transaction', $id);
        $result= $this->db->delete('trucking_service_transaction'); 
        
        if($result){
          
            redirect('dashboard/page/1','refresh');
        }
	}
	
	public function serviceedit(){
	    $this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->showEditService();
	}
	
	public function profile(){
		$this->load->model('Trucking','trucking');
		$this->trucking->showProfile();
	}
	public function showU(){
	   	$this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->showUser();
	}
	
	public function showS(){
	   	$this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->showService();
	}
	

	public function adduser()
	{
		$this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->showAddUser();
	}

	public function editUser($id)
	{
		$this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->editUser($id);
	}

	public function submitEditUser()
	{
		$this->load->model('Trucking','trucking');
		$this->trucking->processEditUser();
	}

	public function deleteUser($id)
	{
		$this->load->model('Trucking','trucking');
		$this->trucking->deleteUser($id);
	}

	public function addservice()
	{
		$this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->showAddService();
	}

	public function submitUser()
	{
		$this->ionAuthCheck();
		$this->load->model('Trucking','trucking');
		$this->trucking->processAddUser();
	}
	
	public function submitEditService(){
	    $this->ionAuthCheck();
	    $this->load->model('Trucking','trucking');
	    $this->trucking->processEditService();
	}
	
	public function updateData(){
	    $this->ionAuthCheck();
	    $this->load->model('Trucking','trucking');
	    $this->trucking->processEditMaster();
	}
	


	
	public function submitService(){
	    $this->ionAuthCheck();
	    $this->load->model('Trucking','trucking');
	    $this->trucking->processAddService();
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