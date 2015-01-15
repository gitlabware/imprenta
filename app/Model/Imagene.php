<?php
App::uses('AppModel', 'Model');
/**
 * Imagene Model
 *
 * @property Trabajo $Trabajo
 */
class Imagene extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Trabajo' => array(
			'className' => 'Trabajo',
			'foreignKey' => 'trabajo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
