<?php
App::uses('Matter', 'Model');

/**
 * Matter Test Case
 */
class MatterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.matter',
		'app.publication',
		'app.teacher'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Matter = ClassRegistry::init('Matter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Matter);

		parent::tearDown();
	}

}
