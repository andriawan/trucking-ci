<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
		// mencegah migrations aktif pada mode production
		if (ENVIRONMENT !== 'development') {
			redirect(base_url(), 'refresh');
		}
	}

	public function index()
	{
		echo "<h1>Migration menu</h1><br>";
		echo "<a href='migration/migrate/latest'>activate</a><br>";
		echo "<a href='migration/migrate/list'>migration list</a>";
	}

	public function migrate($param = 'latest')
	{
		switch ($param) {
			case 'latest':
				if ($this->migration->latest()) {
					echo "<h1>";
					echo "Migrasi berhasil dilakukan. silahkan cek database";
					echo "</h1>";
				};
				break;
			case 'list':
					echo "<pre>";
					echo var_dump($this->migration->find_migrations());
					echo "</pre>";
				break;
			default:
				var_dump($this->migration->version($param));
				break;
		}
	}

}

/* End of file Migration.php */
/* Location: ./application/controllers/Migration.php */