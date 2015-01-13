<?php
App::uses('AppController','Controller');

class InsumosController extends AppController{
    public $layout= 'imprenta';
    public $uses = array('Insumo');
    
    public function index(){
        $insumos=$this->Insumo->find('all');
        $this->set(compact('insumos'));
    }
    
    public function insumo($idinsumo = null){
        $this->layout='ajax';
    }
}

