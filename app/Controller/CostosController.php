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
        /* $this->Costo->recursive = 0;
          $this->set('costos', $this->Paginator->paginate()); */
        $costos = $this->Costo->find('all');
        $this->set(compact('costos'));
    }


    public function add() {
        
        $this->layout='ajax';
        if ($this->request->is('post')) {
            //debug($this->request->data); exit;
            $insumo=$this->Insumo->find ('all', array('recursive'=>));
            $this->Costo->create();
            
            if ($this->Costo->save($this->request->data)) {
                $this->Session->setFlash ('El costo se registro correctamente','msgbueno');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al registrar', 'msgerror');
            }
        }
    }

    public function edit($id = null) {
        $this->layout='ajax';
        if (!$this->Costo->exists($id)) {
            throw new NotFoundException('Costo invalido', 'msgerror');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Costo->save($this->request->data)) {
                $this->Session->setFlash('Modificacion correcta', 'msgbueno');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo guardar', 'msgerror');
            }
        } else {
            $options = array('conditions' => array('Costo.' . $this->Costo->primaryKey => $id));
            $this->request->data = $this->Costo->find('first', $options);
        }
    }

    public function delete($id = null) {
        $this->Costo->id = $id;
        if (!$this->Costo->exists()) {
            //throw new NotFoundException('Costo Invalido');
            $this->Session->setFlash('Costo Invalido');
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->Costo->delete()) {
            $this->Session->setFlash('Se elimino correctamente', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar','msgerror');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
