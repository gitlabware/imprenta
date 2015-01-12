<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $components = array('Paginator');
    public $layout = 'imprenta';
    public $uses=array('User');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    public function index() {
        $usuarios = $this->User->find('all');
        $this->set(compact('usuarios'));
    }

    public function usuario($idusuario=null) {
        $this->layout = 'ajax';
        $this->User->id=$idusuario;
        //debug($idusuario);exit;
        $this->request->data=$this->User->read();
    }

    public function guardarusuario() {
        //debug($this->request->data); exit;
        $valida = $this->validar('User');
        if(empty($valida)){
            $this->User->create();
            $this->User->save($this->request->data['User']);
            $this->Session->setFlash('Se registro correctamente');
        }else{
            $this->Session->setFlash($valida);
        }
        $this->redirect(array('action'=>'index'));
    }

    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function imagenes() {
        list($ancho, $alto, $tipo, $atributos) = getimagesize("http://localhost/imprenta/fanta.jpg");
        //$i = imagecreatefromjpeg($filename)    
        //$img = "http://localhost/imprenta/fanta.jpg";
        //demo
        $w = imagesx($img);
        $h = imagesy($img);
        $r = $g = $b = 0;
        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                $rgb = imagecolorat($img, $x, $y);
                $r += $rgb >> 16;
                $g += $rgb >> 8 & 255;
                $b += $rgb & 255;
            }
        }
        $pxls = $w * $h;
        $r = dechex(round($r / $pxls));
        $g = dechex(round($g / $pxls));
        $b = dechex(round($b / $pxls));
        if (strlen($r) < 2) {
            $r = 0 . $r;
        }
        if (strlen($g) < 2) {
            $g = 0 . $g;
        }
        if (strlen($b) < 2) {
            $b = 0 . $b;
        }
        echo "#" . $r . $g . $b;
    }

}
