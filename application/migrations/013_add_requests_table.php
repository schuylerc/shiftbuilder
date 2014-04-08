<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Requests_Table extends CI_Migration {

	public function up()
	{
		// Drop table 'shifts' if it exists		
		$this->dbforge->drop_table('requests');

		// Table structure for table 'shifts'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
				'email' => array(
						'type' => 'VARCHAR',
						'constraint' => '255',
				)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('requests');

	}

	public function down()
	{
		$this->dbforge->drop_table('requests');
	}
}
