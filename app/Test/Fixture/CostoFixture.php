<?php
/**
 * CostoFixture
 *
 */
class CostoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'preciocompra' => array('type' => 'decimal', 'null' => true, 'default' => '0', 'length' => 10, 'unsigned' => false),
		'rendimiento' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'costouno' => array('type' => 'decimal', 'null' => true, 'default' => '0.00', 'length' => '15,2', 'unsigned' => false),
		'costodos' => array('type' => 'decimal', 'null' => true, 'default' => '0.00', 'length' => '15,2', 'unsigned' => false),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'nombre' => 'Lorem ipsum dolor sit amet',
			'preciocompra' => '',
			'rendimiento' => 1,
			'costouno' => '',
			'costodos' => '',
			'created' => '2015-01-21',
			'modified' => '2015-01-21'
		),
	);

}
