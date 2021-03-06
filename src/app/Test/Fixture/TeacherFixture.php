<?php
/**
 * Teacher Fixture
 */
class TeacherFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'institution' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'matter_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'place' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_teachers_users' => array('column' => 'user_id', 'unique' => 0),
			'fk_teachers_matters' => array('column' => 'matter_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'institution' => 'Lorem ipsum dolor sit amet',
			'matter_id' => 1,
			'place' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1
		),
	);

}
