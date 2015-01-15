<?php
App::uses('Trabajo', 'Model');

/**
 * Trabajo Test Case
 *
 */
class TrabajoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Trabajo = ClassRegistry::init('Trabajo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Trabajo);

		parent::tearDown();
	}

}
