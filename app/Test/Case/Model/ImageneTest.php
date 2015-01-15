<?php
App::uses('Imagene', 'Model');

/**
 * Imagene Test Case
 *
 */
class ImageneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.imagene',
		'app.trabajo',
		'app.cliente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Imagene = ClassRegistry::init('Imagene');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Imagene);

		parent::tearDown();
	}

}
