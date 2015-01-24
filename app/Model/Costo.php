<?php
App::uses('AppModel', 'Model');
/**
 * Costo Model
 *
 * @property Insumo $Insumo
 */
class Costo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Insumo' => array(
			'className' => 'Insumo',
			'foreignKey' => 'insumo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
