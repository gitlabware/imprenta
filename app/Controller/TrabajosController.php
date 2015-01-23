<?php

class TrabajosController extends AppController {

  public $layout = 'imprenta';
  public $uses = array('Trabajo', 'User', 'Imagene', 'Cliente');

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow();
  }

  public function trabajo() {
    $clientes = $this->User->find('list', array('fields' => 'User.nombre', 'conditions' => array('User.role' => 'Cliente')));
    $this->set(compact('clientes'));
  }

  public function guarda_trabajo() {
    if (!empty($this->request->data)) {
      //debug($this->request->data);exit;
      $this->Trabajo->create();
      $this->Trabajo->save($this->request->data['Trabajo']);
      $idTrabajo = $this->Trabajo->getLastInsertID();
      foreach ($this->request->data['Imagen'] as $img) {
        $this->request->data['Adjunto'] = $img;
        $this->carga_adjunto($idTrabajo);
      }
      $this->Session->setFlash('Se registro correctamente el trabajo!!!', 'msgbueno');
      $this->redirect(array('action' => 'vista_trabajo', $idTrabajo));
    }
  }

  public function vista_trabajo($idTrabajo = NULL) {
    $trabajo = $this->Trabajo->findByid($idTrabajo);
    $imagenes = $this->Imagene->findAllBytrabajo_id($idTrabajo, NULL, NULL, NULL, NULL, -1);
    $this->set(compact('imagenes', 'trabajo'));
    //debug($trabajo);exit;
    //debug($imagenes);exit;
  }

  public function carga_adjunto($idTrabajo = null) {
    //debug($this->request->data);exit;
    $archivoImagen = $this->request->data['Adjunto']['imagen'];
    $nombreOriginal = $this->request->data['Adjunto']['imagen']['name'];
    //debug($archivoImagen['error']);exit;
    $nombre_tipo = explode(".", $nombreOriginal);
    //debug(end($nombre_tipo));exit;
    $nombre = string::uuid() . "." . end($nombre_tipo);
    if ($this->guarda_archivo($archivoImagen, $nombre)) {
      $rutaImagen = 'imagenest' . DS . $nombre;
      $coloresEnRgb = $this->coloresRgb($rutaImagen);
      $toRgb = $this->hex2rgb($coloresEnRgb);
      $coloresCMYK = $this->rgb2cmyk($toRgb);
      debug($coloresCMYK['c']);
      debug($coloresCMYK['m']);
      debug($coloresCMYK['y']);
      debug($coloresCMYK['k']);
      exit(); 
      //debug($coloresCMYK);
      $c=round($coloresCMYK['c'],2)*1000;
      $m=round($coloresCMYK['m'],2)*1000;
      $y=round($coloresCMYK['y'],2)*1000;
      $k=round($coloresCMYK['k'],2)*1000;
      //debug($coloresEnRgb);
      //die;
      $this->request->data['Imagene']['url'] = 'imagenest' . DS . $nombre;
      $this->request->data['Imagene']['c'] = $c;
      $this->request->data['Imagene']['m'] = $m;
      $this->request->data['Imagene']['y'] = $y;
      $this->request->data['Imagene']['k'] = $k;
      $this->request->data['Imagene']['rgb'] = $coloresEnRgb;
      $this->request->data['Imagene']['trabajo_id'] = $idTrabajo;
      $this->request->data['Imagene']['cantidad'] = $this->request->data['Adjunto']['cantidad'];
      $this->request->data['Imagene']['cantidad_imagenes'] = $this->request->data['Adjunto']['cantidad_imagenes'];
      $this->request->data['Imagene']['trabajo_id'] = $idTrabajo;
      $this->Imagene->create();
      $this->Imagene->save($this->request->data['Imagene']);
    } else {
      $this->Trabajo->delete($idTrabajo);
      $this->Imagene->deleteAll(array('Imagene.trabajo_id'));
      $this->Session->setFlash('Ocurrio un error con la imagen ' . $nombreOriginal . ', intente nuevamente', 'msgerror');
      $this->redirect(array('action' => 'trabajo'));
    }
  }

  public function guarda_archivo($archivo = null, $nombre = null) {
    if ($archivo['error'] === UPLOAD_ERR_OK) {
      if (move_uploaded_file($archivo['tmp_name'], WWW_ROOT . 'imagenest' . DS . $nombre)) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function genera_trabajo($idTrabajo = null) {

    debug($idTrabajo);
    exit;
  }

  public function comboclientes1($campoform = null, $div = null) {
    $this->layout = 'ajax';
    //debug($campoform);exit;
    $this->set(compact('campoform', 'div'));
  }

  public function comboclientes2($campoform = null, $div = null) {
    $this->layout = 'ajax';
    //debug($this->request->data);exit;
    if (!empty($this->request->data['Cliente']['nombre'])) {
      $listaclientes = $this->Cliente->find('all', array('recursive' => -1,
        'conditions' =>
        array('Cliente.nombre LIKE' => '%' . $this->request->data['Cliente']['nombre'] . "%"),
        'limit' => 8,
        'order' => 'Cliente.nombre ASC'
      ));
    }

    $this->set(compact('listaclientes', 'div', 'campoform'));
  }

  public function comboclientes3($campoform = null, $div = null, $idCliente = null) {
    $this->layout = 'ajax';
    $scliente = $this->Cliente->findByid($idCliente, null, null, -1);
    $this->set(compact('campoform', 'scliente', 'div'));
  }

  private function coloresRgb($imagen = null) {
    //$img = "fanta.jpg";
    $img = imagecreatefromjpeg($imagen);
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
    $colorRgb = "#" . $r . $g . $b;
    //echo "son #" . $r . $g . $b . '<br />';
    return $colorRgb;
  }

  private function hex2rgb($hex) {
    $color = str_replace('#', '', $hex);
    $rgb = array('r' => hexdec(substr($color, 0, 2)),
      'g' => hexdec(substr($color, 2, 2)),
      'b' => hexdec(substr($color, 4, 2)));
    return $rgb;
  }

  private function rgb2cmyk($var1, $g = 0, $b = 0) {
    if (is_array($var1)) {
      $r = $var1['r'];
      $g = $var1['g'];
      $b = $var1['b'];
    } else
      $r = $var1;
    $cyan = 255 - $r;
    $magenta = 255 - $g;
    $yellow = 255 - $b;
    $black = min($cyan, $magenta, $yellow);
    $cyan = @(($cyan - $black) / (255 - $black)) * 255;
    $magenta = @(($magenta - $black) / (255 - $black)) * 255;
    $yellow = @(($yellow - $black) / (255 - $black)) * 255;
    return array(
      'c' => $cyan / 255,
      'm' => $magenta / 255,
      'y' => $yellow / 255,
      'k' => $black / 255);
  }

}
