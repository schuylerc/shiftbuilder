<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_fixed_mistake_in_table extends CI_Migration {

	public function up()
	{
		// Drop table 'job_types' if it exists		
		$this->dbforge->drop_table('job_types');
		$this->dbforge->drop_table('jobs_types');
		

		// Table structure for table 'job_types'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
					'type' => 'VARCHAR',
					'constraint' => '255',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('job_types');

	}

	public function down()
	{
		$this->dbforge->drop_table('job_types');
	}
}
