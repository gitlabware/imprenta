<?php
App::uses('Parametrosfactura', 'Model');

/**
 * Parametrosfactura Test Case
 *
 */
class ParametrosfacturaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.parametrosfactura'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Parametrosfactura = ClassRegistry::init('Parametrosfactura');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Parametrosfactura);

		parent::tearDown();
	}

}
