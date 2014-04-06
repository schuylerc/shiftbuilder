<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_added_user_status_fields extends CI_Migration {

	public function up()
	{
		$fields = array(
             'employer_id' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '20',
			)
		);
		$this->dbforge->modify_column('users', $fields);

	}

	public function down()
	{
		$this->dbforge->drop_column('users', 'employer_id');
	}
}
