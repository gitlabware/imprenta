<?php

class TrabajosController extends AppController {

    public $layout = 'imprenta';
    public $uses = array('Trabajo', 'User', 'Imagene', 'Cliente', 'Insumo', 'Inventario');

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow();
    }

    public function trabajo() {
        $papeles = $this->Insumo->find('list', array('fields' => 'Insumo.nombre', 'conditions' => array('Insumo.tipo' => 'Papel')));
        $this->set(compact('clientes', 'papeles'));
    }

    public function guarda_trabajo() {
        if (!empty($this->request->data)) {
            $this->request->data['Trabajo']['estado'] = 0;
            if (!empty($this->request->data['Cliente']['nombre'])) {
                $this->Cliente->create();
                $this->Cliente->save($this->request->data['Cliente']);
                $this->request->data['Trabajo']['cliente_id'] = $this->Cliente->getLastInsertID();
            }
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
            /* debug($coloresCMYK['c']);
              debug($coloresCMYK['m']);
              debug($coloresCMYK['y']);
              debug($coloresCMYK['k']);
              exit(); */
            //debug($coloresCMYK);
            $c = round($coloresCMYK['c'], 2) * 100;
            $m = round($coloresCMYK['m'], 2) * 100;
            $y = round($coloresCMYK['y'], 2) * 100;
            $k = round($coloresCMYK['k'], 2) * 100;
            //debug($coloresEnRgb);
            //die;
            $this->request->data['Imagene']['url'] = 'imagenest' . DS . $nombre;
            $this->request->data['Imagene']['c'] = $c;
            $this->request->data['Imagene']['m'] = $m;
            $this->request->data['Imagene']['y'] = $y;
            $this->request->data['Imagene']['k'] = $k;
            $this->request->data['Imagene']['rgb'] = $coloresEnRgb;
            $this->request->data['Imagene']['trabajo_id'] = $idTrabajo;
            //$this->request->data['Imagene']['cantidad'] = $this->request->data['Adjunto']['cantidad'];
            //$this->request->data['Imagene']['cantidad_imagenes'] = $this->request->data['Adjunto']['cantidad_imagenes'];
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

    public function genera_trabajo($idTrabajo = null) {
        $this->Trabajo->create();
        $this->request->data['Trabajo']['id'] = $idTrabajo;
        $this->request->data['Trabajo']['estado'] = 1;
        $this->Trabajo->save($this->request->data['Trabajo']);
        $trabajo = $this->Trabajo->find('first', array('recursive' => -1,'conditions' => array('Trabajo.id' => $idTrabajo)));
        $ultimo_insumo = $this->Inventario->find('first', array('order' => 'Inventario.id DESC', 'recursive' => -1, 'conditions' => array('Inventario.insumo_id' => $trabajo['Trabajo']['insumo_id'])));
        if (!empty($ultimo_insumo)) {
            if ($ultimo_insumo['Inventario']['cantidad_total'] >= $trabajo['Trabajo']['cantidad']) {
                $this->Inventario->create();
                $this->request->data['Inventario']['insumo_id'] = $trabajo['Trabajo']['insumo_id'];
                $this->request->data['Inventario']['cantidad'] = $trabajo['Trabajo']['cantidad'];
                $this->request->data['Inventario']['tipo'] = 'Usado';
                $this->request->data['Inventario']['cantidad_total'] = $ultimo_insumo['Inventario']['cantidad_total'] - $trabajo['Trabajo']['cantidad'];
                $this->Inventario->save($this->request->data['Inventario']);
                $this->redirect(array('action' => 'nota_trabajo',$idTrabajo));
            } else {
                $this->Session->setFlash('Los insumos en almacen no son suficientes', 'msgerror');
                $this->redirect(array('action' => 'vista_trabajo', $idTrabajo));
            }
        } else {
            $this->Session->setFlash('Los insumos en almacen no son suficientes', 'msgerror');
            $this->redirect(array('action' => 'vista_trabajo', $idTrabajo));
        }
    }
    
    public function nota_trabajo($idTrabajo = NULL) {
        $trabajo = $this->Trabajo->find('first',array('conditions' => array('Trabajo.id' => $idTrabajo),'fields' => array(
            'Trabajo.id','Trabajo.descripcion','Cliente.nombre','Cliente.nit','Insumo.nombre','Trabajo.cantidad'
        )));
        $imagenes = $this->Imagene->find('all',array('conditions' => array('Imagene.trabajo_id' => $idTrabajo)));
        $this->set(compact('trabajo','imagenes'));
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
    public function index()
    {
        $trabajos = $this->Trabajo->find('all',array('order' => 'Trabajo.id DESC'));
        $this->set(compact('trabajos'));
    }
}
