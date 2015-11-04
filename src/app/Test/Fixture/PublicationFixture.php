<?php
/**
 * Publication Fixture
 */
class PublicationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'registration' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'text_publication' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 5000, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'teacher_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'text_review' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 5000, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_users3' => array('column' => 'user_id', 'unique' => 0),
			'fk_types' => array('column' => 'type_id', 'unique' => 0),
			'fk_teachers' => array('column' => 'teacher_id', 'unique' => 0)
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
			'registration' => '2015-11-04 13:08:07',
			'title' => 'Lorem ipsum dolor sit amet',
			'text_publication' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'type_id' => 1,
			'status' => 1,
			'teacher_id' => 1,
			'text_review' => 'Lorem ipsum dolor sit amet'
		),
	);

}
