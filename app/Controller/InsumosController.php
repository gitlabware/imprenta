<?php
App::uses('AppController','Controller');

class InsumosController extends AppController{
    public $layout= 'imprenta';
    public $uses = array('Insumo', 'Inventario');
    
    public function index(){
        $insumos=$this->Insumo->find('all');
        $this->set(compact('insumos'));
    }
    
    public function insumo($idinsumo = null){
        $this->layout='ajax';
        $this->Insumo->id=$idinsumo;
        //debug($idinsumo); die;
        //$this->requets->data = $this->Insumo->read();
        $this->request->data = $this->Insumo->read();
    }
    
    public function guardarinsumo() {
        //debug($this->request->data); exit;
        $valida = $this->validar('Insumo');
        if (empty($valida)) {
            $this->Insumo->create();
            $this->Insumo->save($this->request->data['Insumo']);
            $this->Session->setFlash('Se registro correctamente','msgbueno');
        } else {
            $this->Session->setFlash($valida);
        }
        $this->redirect(array('action' => 'index'));
        
    }
    
     public function delete($id = null) {
        $this->Insumo->id = $id;
        if (!$this->Insumo->exists()) {
            //throw new NotFoundException(__('Invalid user'));
            $this->Session->setFlash('No existe el usuario.');
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->Insumo->delete()) {
            $this->Session->setFlash('se elimino correctamente el insumo','msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar el usuario.','msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

    
    public function adiciona($idinsumo=null){
      $this->layout='ajax';
      $insumo=$this->Insumo->find('first',array('conditions'=>array('Insumo.id'=>$idinsumo)));
      $this->set(compact('insumo'));
    }
    
    public function registraingreso (){
        //debug($this->request->data);exit;
        $ultimoregistro=$this->Inventario->find('first',array('recursive'=>-1,'order'=>'Inventario.id DESC','conditions'=>array('Inventario.insumo_id'=>$this->request->data['Inventario']['insumo_id'])));
        if(isset($ultimoregistro['Inventario']['cantidad_total']))
        {
            $this->request->data['Inventario']['cantidad_total']=$ultimoregistro['Inventario']['cantidad_total']+($this->request->data['Inventario']['cantidad']*$this->request->data['Inventario']['cantidadu']);
        }
        else{
            $this->request->data['Inventario']['cantidad_total'] = $this->request->data['Inventario']['cantidad']*$this->request->data['Inventario']['cantidadu'];
        }
        $this->request->data['Inventario']['precio_total']=$this->request->data['Inventario']['precio']*$this->request->data['Inventario']['cantidad'];
        $valida = $this->validar('Inventario');
        
        if (empty($valida)) {
            $this->Inventario->create();
            $this->Inventario->save($this->request->data['Inventario']);
            $this->Session->setFlash('Se registro correctamente','msgbueno');
        } else {
            $this->Session->setFlash($valida);
        }
        
        $this->redirect(array('action' => 'index'));
    }
    public function gettotalinsumo ($insumoid){
        $ultimoregistro=$this->Inventario->find('first',array('recursive'=>-1,'order'=>'Inventario.id DESC','conditions'=>array('Inventario.insumo_id'=>$insumoid)));
         if(empty($ultimoregistro))
         {
             return 0;
         }  else {
             return $ultimoregistro['Inventario']['cantidad_total'];
         }
        debug($ultimoregistro); exit;
    }
}

