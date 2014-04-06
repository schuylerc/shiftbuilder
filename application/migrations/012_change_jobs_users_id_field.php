<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_change_jobs_users_id_field extends CI_Migration {

	public function up()
	{
		//rename existing to _start
		$fields = array(
				'id' => array(
						'name' => 'ju_id',
						'type' => 'MEDIUMINT'
				)
		);
		$this->dbforge->modify_column('jobs_users', $fields);
		
	}

	public function down()
	{
		//no down function available for this
		
	}
}
