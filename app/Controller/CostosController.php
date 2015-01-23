<?php
App::uses('AppController', 'Controller');
/**
 * Costos Controller
 *
 * @property Costo $Costo
 * @property PaginatorComponent $Paginator
 */
class CostosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $layout = 'imprenta';
	public $uses = array('Costo');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		/*$this->Costo->recursive = 0;
		$this->set('costos', $this->Paginator->paginate());*/
		$costos = $this->Costo->find('all');
		$this->set(compact('costos'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Costo->exists($id)) {
			throw new NotFoundException(__('Invalid costo'));
		}
		$options = array('conditions' => array('Costo.' . $this->Costo->primaryKey => $id));
		$this->set('costo', $this->Costo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Costo->create();
			if ($this->Costo->save($this->request->data)) {
				$this->Session->setFlash(__('The costo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The costo could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Costo->exists($id)) {
			throw new NotFoundException(__('Invalid costo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Costo->save($this->request->data)) {
				$this->Session->setFlash(__('The costo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The costo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Costo.' . $this->Costo->primaryKey => $id));
			$this->request->data = $this->Costo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Costo->id = $id;
		if (!$this->Costo->exists()) {
			throw new NotFoundException(__('Invalid costo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Costo->delete()) {
			$this->Session->setFlash(__('The costo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The costo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
