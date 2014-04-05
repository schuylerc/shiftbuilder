<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_link_jobs_users_table extends CI_Migration {

	public function up()
	{
		// Drop table 'job_types' if it exists		
		$this->dbforge->drop_table('job_types');

		// Table structure for table 'job_types'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'user_id' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '8',
				),
			'job_id' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '8',
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
