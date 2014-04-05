<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Update_Users_Table extends CI_Migration {

	public function up()
	{

		// Table structure for table 'groups'
		$fields = array(
			'max_hours' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '8',
			),
			'hours_scheduled' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '8',
			),
			'sun_availability' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '20',
			),
			'mon_availability' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '20',
			),
			'tue_availability' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '20',
			),
			'wed_availability' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '20',
			),
			'thu_availability' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '20',
			),
			'fri_availability' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '20',
			),
			'sat_availability' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '20',
			),
			'pref_time_1' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '2',
			),
			'pref_time_2' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '2',
			),
			'pref_time_3' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '2',
			),
			'pref_time_4' => array(
					'type' => 'MEDIUMINT',
					'constraint' => '2',
			)
		);
		$this->dbforge->add_column('users', $fields);

	}

	public function down()
	{
		$this->dbforge->drop_column('users', 'max_hours');
		$this->dbforge->drop_column('users', 'hours_scheduled');
		$this->dbforge->drop_column('users', 'sun_availability');
		$this->dbforge->drop_column('users', 'mon_availability');
		$this->dbforge->drop_column('users', 'tue_availability');
		$this->dbforge->drop_column('users', 'wed_availability');
		$this->dbforge->drop_column('users', 'thu_availability');
		$this->dbforge->drop_column('users', 'fri_availability');
		$this->dbforge->drop_column('users', 'sat_availability');
		$this->dbforge->drop_column('users', 'pref_time_1');
		$this->dbforge->drop_column('users', 'pref_time_2');
		$this->dbforge->drop_column('users', 'pref_time_3');
		$this->dbforge->drop_column('users', 'pref_time_4');
		
		
	}
}
