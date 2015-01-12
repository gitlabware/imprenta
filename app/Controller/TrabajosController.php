<?php
class TrabajosController extends AppController
{
    public $layout = 'imprenta';
    public $uses = array('Trabajo','User');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    public function trabajo()
    {
        $clientes = $this->User->find('list',array('fields' => 'User.nombre','conditions' => array('User.role' => 'Cliente')));
        $this->set(compact('clientes'));
    }
}