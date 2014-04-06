<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_change_user_avail_storage extends CI_Migration {

	public function up()
	{
		//rename existing to _start
		$fields = array(
				'sun_availability' => array(
						'name' => 'sun_availability_start',
						'type' => 'MEDIUMINT'
				),
				'mon_availability' => array(
						'name' => 'mon_availability_start',
						'type' => 'MEDIUMINT'
				),
				'tue_availability' => array(
						'name' => 'tue_availability_start',
						'type' => 'MEDIUMINT'
				),
				'wed_availability' => array(
						'name' => 'wed_availability_start',
						'type' => 'MEDIUMINT'
				),
				'thu_availability' => array(
						'name' => 'thu_availability_start',
						'type' => 'MEDIUMINT'
				),
				'fri_availability' => array(
						'name' => 'fri_availability_start',
						'type' => 'MEDIUMINT'
				),
				'sat_availability' => array(
						'name' => 'sat_availability_start',
						'type' => 'MEDIUMINT'
				)
		);
		$this->dbforge->modify_column('users', $fields);
		
		//add fields to _stop
		$fields = array(
				'sun_availability_stop' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '20',
				),
				'mon_availability_stop' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '20',
				),
				'tue_availability_stop' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '20',
				),
				'wed_availability_stop' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '20',
				),
				'thu_availability_stop' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '20',
				),
				'fri_availability_stop' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '20',
				),
				'sat_availability_stop' => array(
						'type' => 'MEDIUMINT',
						'constraint' => '20',
				)	
		);
		$this->dbforge->add_column('users', $fields);

	}

	public function down()
	{
		//no down function available for this
		
	}
}
