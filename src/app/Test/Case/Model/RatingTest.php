<?php
App::uses('Rating', 'Model');

/**
 * Rating Test Case
 */
class RatingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rating',
		'app.user',
		'app.publication',
		'app.type',
		'app.matter',
		'app.teacher',
		'app.attachment',
		'app.comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Rating = ClassRegistry::init('Rating');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rating);

		parent::tearDown();
	}

}
