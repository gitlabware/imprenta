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
    }
    
    public function adiciona(){
      $estado = 'ingreso';
      $insumoId = 2;
      $cantidad = 10;
      $salida = 2;
      $ultimoRegistro = $this->Inventario->find('first', array(
        'conditions'=>array('Inventario.id'=>$insumoId),
        'order'=>array('Inventario.id DESC')
      ));
      debug($ultimoRegistro);     
      $totalAnterior = $ultimoRegistro['Inventario']['cantidad_total'];
      debug($totalAnterior);
      
      $this->request->data['Inventario']['insumo_id']=$insumoId;
      $this->request->data['Inventario']['cantidad']=$cantidad;
      $this->request->data['Inventario']['tipo']=$estado;
      $this->request->data['Inventario']['cantidad_total']=$totalAnterior+$cantidad;
      $this->Inventario->create();       
      if($this->Inventario->save($this->request->data['Inventario'])){
        echo 'Guardo';        
      }else{
        echo 'No pudo guardar';
      }
      //$totalPrueba = $totalAnterior+$cantidad;
      //debug($totalPrueba);
    }
}

