<?php
/**
 * Attachment Fixture
 */
class AttachmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'file' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5000, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'publication_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'fk_attachments_publications' => array('column' => 'publication_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'file' => 'Lorem ipsum dolor sit amet',
			'publication_id' => 1
		),
	);

}
