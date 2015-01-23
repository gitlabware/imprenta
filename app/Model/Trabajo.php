<?php
App::uses('AppModel', 'Model');
/**
 * Trabajo Model
 *
 * @property Cliente $Cliente
 * @property Insumo $Insumo
 */
class Trabajo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Insumo' => array(
			'className' => 'Insumo',
			'foreignKey' => 'insumo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
