<?php
/**
 * TrabajoFixture
 *
 */
class TrabajoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cliente_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'descripcion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cantidad' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => false),
		'insumo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'estado' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'cliente_id' => 1,
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'cantidad' => 1,
			'insumo_id' => 1,
			'estado' => 'Lorem ipsum dolor sit amet'
		),
	);

}
