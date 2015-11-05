<?php
App::uses('Teacher', 'Model');

/**
 * Teacher Test Case
 */
class TeacherTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.teacher',
		'app.user',
		'app.publication',
		'app.type',
		'app.attachment',
		'app.comment',
		'app.rating'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Teacher = ClassRegistry::init('Teacher');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Teacher);

		parent::tearDown();
	}

}
