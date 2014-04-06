<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_added_more_user_status_fields extends CI_Migration {

	public function up()
	{
		$fields = array(
             'admin' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '2',
			),
				'get_texts' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '2',
				),
				'get_emails' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '2',
				),
					
		);
		$this->dbforge->add_column('users', $fields);

	}

	public function down()
	{
		$this->dbforge->drop_column('users', 'admin');
		$this->dbforge->drop_column('users', 'get_texts');
		$this->dbforge->drop_column('users', 'get_emails');
		
	}
}
