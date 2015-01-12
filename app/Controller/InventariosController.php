<?php

App::uses('AppController', 'Controller');

class InventariosController extends AppController {
    public $layout = 'imprenta';
    public $uses = array('Inventario','Insumo');
    public function index()
    {
        $sql1 = "SELECT * FROM inventarios WHERE 1 ORDER BY id DESC";
        $sql2 = "SELECT * FROM ($sql1) AS Inventario WHERE 1 GROUP BY insumo_id";
        $sql3 = "SELECT * FROM ($sql2) AS Inventario LEFT JOIN insumos AS Insumo ON(Inventario.insumo_id = Insumo.id) WHERE 1";
        $inventarios = $this->Inventario->query($sql3);
        $this->set(compact('inventarios'));
        //debug($inventarios);exit;
    }
    
    public function movimiento($idInsumo = NULL,$tipo = NULL)
    {
        $this->layout = 'ajax';
        $insumos = $this->Insumo->find('list',array('fields' => 'Insumo.nombre'));
        $this->set(compact('insumos','idInsumo','tipo'));
    }

    public function inventario($idInventario = null)
    {
        $this->Inventario->id = $idInventario;
        $this->request->data = $this->Inventario->read();
        $insumos = $this->Insumo->find('list',array('fields' => 'Insumo.nombre'));
        $this->set(compact('insumos'));
    }
    public function guarda_inventario()
    {
        $insumo = $this->Insumo->find('first',array('recursive' => -1,'conditions' => array('Insumo.id' => $this->request->data['Inventario']['insumo_id'])));
        
        $valida = $this->validar('Insumo');
        if(empty($valida))
        {
            $this->Inventario->create();
            $this->Inventario->save($this->request->data['Inventario']);
            $this->Session->setFlash('Se registro correctamente!!!','msgbueno');
        }  else {
            $this->Session->setFlash($valida,'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }
    public function delete($id = null) {
        $this->Inventario->id = $id;
        if (!$this->Inventario->exists()) {
            throw new NotFoundException(__('Registro Invalido'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Inventario->delete()) {
            $this->Session->setFlash('El registro fue eliminado!!!','msgbueno');
        } else {
            $this->Session->setFlash(__('El registro pudo no haber sido eliminado intente nuevamente'),'msgerror');
        }
        return $this->redirect(array('action' => 'index'));
    }
}
