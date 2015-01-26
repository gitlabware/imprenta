<?php
/**
 * FacturaFixture
 *
 */
class FacturaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'codigo_control' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cliente' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'nit' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'importetotal' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => null),
		'numero' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'autorizacion' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'date', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'codigo_control' => 'Lorem ipsum dolor ',
			'cliente' => 'Lorem ipsum dolor sit amet',
			'nit' => 'Lorem ipsum dolor sit amet',
			'importetotal' => '',
			'fecha' => '2015-01-23',
			'numero' => 1,
			'autorizacion' => 1,
			'created' => '2015-01-23'
		),
	);

}
