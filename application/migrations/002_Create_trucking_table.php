<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_trucking_table extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		// =========================trucking_transaction ========================

		$this->dbforge->drop_table('trucking_transaction', TRUE);

		$this->dbforge->add_field(array(
			'id_transaction' => array(
				'type' => 'INT',
				'constraint' => '9',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'car_number' => array(
				'type' => 'VARCHAR',
				'constraint' => '10'
			),
			'stnk_date' => array(
				'type' => 'DATETIME',
			),
			'pkb_date' => array(
				'type' => 'DATETIME',
			),
			'service_date' => array(
				'type' => 'DATETIME',
			),
			'kir_date' => array(
				'type' => 'DATETIME',
			),
			'sipa_date' => array(
				'type' => 'DATETIME',
			),
			'ibm_date' => array(
				'type' => 'DATETIME',
			),

		));

		$this->dbforge->add_key('id_transaction', TRUE);
		$this->dbforge->create_table('trucking_transaction');

		// =========================trucking_transaction ========================

		$this->dbforge->drop_table('service_category', TRUE);

		$this->dbforge->add_field(array(
			'id_service' => array(
				'type' => 'INT',
				'constraint' => '9',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'category' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),
			'price' => array(
				'type' => 'INT',
				'constraint' => '9'
			)

		));

		$this->dbforge->add_key('id_service', TRUE);
		$this->dbforge->create_table('service_category');


		// =========================trucking_transaction ========================

		$this->dbforge->drop_table('trucking_service_transaction', TRUE);

		$this->dbforge->add_field(array(
			'id_transaction' => array(
				'type' => 'INT',
				'constraint' => '9',
				'unsigned' => TRUE
			),
			'id_service' => array(
				'type' => 'INT',
				'constraint' => '9',
				'unsigned' => TRUE,
			)

		));

		// $this->dbforge->add_field(
		// 	'CONSTRAINT `fk_id_transaction`
		// 	FOREIGN KEY (`id_transaction`)
		// 	REFERENCES `trucking_transaction` (`id_transaction`)
		// 	ON DELETE CASCADE
		// 	ON UPDATE CASCADE'
		// );

		// $this->dbforge->add_field(
		// 	'CONSTRAINT `fk_service_category`
		// 	FOREIGN KEY (`id_service`)
		// 	REFERENCES `service_category` (`id_service`)
		// 	ON DELETE CASCADE
		// 	ON UPDATE CASCADE'
		// );

		$this->dbforge->create_table('trucking_service_transaction');



	}

	public function down() {

		$this->dbforge->drop_table('trucking_transaction', TRUE);
		$this->dbforge->drop_table('service_category', TRUE);
		$this->dbforge->drop_table('trucking_service_transaction', TRUE);

		// $this->db->query('ALTER TABLE trucking_service_transaction DROP INDEX fk_id_transaction');
		// $this->db->query('ALTER TABLE trucking_service_transaction DROP INDEX fk_service_category');

		
	}

}

/* End of file 002_Create_trucking_table.php */
/* Location: ./application/migrations/002_Create_trucking_table.php */