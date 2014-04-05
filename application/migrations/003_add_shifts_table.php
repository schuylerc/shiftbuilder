<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Shifts_Table extends CI_Migration {

	public function up()
	{
		// Drop table 'shifts' if it exists		
		$this->dbforge->drop_table('shifts');

		// Table structure for table 'shifts'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'job_type' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
			),
				'start_time' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '8',
				),
				'end_time' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '8',
				),
				'day' => array(
						'type' => 'VARCHAR',
						'constraint' => '8',
				),
				'taken' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '2',
				),
				'taken_by' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '8',
				),
				'replace_request' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '2',
				)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('shifts');

	}

	public function down()
	{
		$this->dbforge->drop_table('shifts');
	}
}
