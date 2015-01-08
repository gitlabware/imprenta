<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

  /**
   * Components
   *
   * @var array
   */
  public $components = array('Paginator');

  /**
   * index method
   *
   * @return void
   */
  public function index() {
    $this->User->recursive = 0;
    $this->set('users', $this->Paginator->paginate());
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    $this->set('user', $this->User->find('first', $options));
  }

  /**
   * add method
   *
   * @return void
   */
  public function add() {
    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
      $this->request->data = $this->User->find('first', $options);
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

  public function imagenes(){
    list($ancho, $alto, $tipo, $atributos) = getimagesize("http://localhost/imprenta/fanta.jpg");
    //$i = imagecreatefromjpeg($filename)    
    //$img = "http://localhost/imprenta/fanta.jpg";
    //demo
    $w = imagesx($img);
    $h = imagesy($img);
    $r = $g = $b = 0;
    for($y = 0; $y < $h; $y++) {
        for($x = 0; $x < $w; $x++) {
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
    if(strlen($r) < 2) {
        $r = 0 . $r;
    }
    if(strlen($g) < 2) {
        $g = 0 . $g;
    }
    if(strlen($b) < 2) {
        $b = 0 . $b;
    }
    echo "#" . $r . $g . $b;
    
  }
}
