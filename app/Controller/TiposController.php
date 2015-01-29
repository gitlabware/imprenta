<?php

class TiposController extends AppController{
    public $layout='imprenta';
    public $uses=array('Tipo');
    
     public function index() {
        $tipos = $this->Tipo->find('all');
        $this->set(compact('tipos'));
    }
    
    public function add (){
        $this->layout='ajax';
        if ($this->request->is('post')) {
            
            $this->Tipo->create();            
            if ($this->Tipo->save($this->request->data)) {
                $this->Session->setFlash (' El tipo de insumo se registro correctamente.','msgbueno');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(' Error al registrar', 'msgerror');
            }
        }
    }
    
    public function edit($id = null) {
        $this->layout='ajax';
        if (!$this->Tipo->exists($id)) {
            throw new NotFoundException('Invalido', 'msgerror');
        }
        if ($this->request->is(array('post', 'put'))) {
        
            if ($this->Tipo->save($this->request->data)) {
                $this->Session->setFlash('Modificacion correcta', 'msgbueno');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo guardar', 'msgerror');
            }
        } else {
            $options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
            $this->request->data = $this->Tipo->find('first', $options);        
        }
    }

    public function delete($id = null) {
        $this->Tipo->id = $id;
        if (!$this->Tipo->exists()) {
            //throw new NotFoundException('Costo Invalido');
            $this->Session->setFlash('Invalido');
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->Tipo->delete()) {
            $this->Session->setFlash('Se elimino correctamente', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar','msgerror');
        }
        return $this->redirect(array('action' => 'index'));
    }
}