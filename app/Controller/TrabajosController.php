<?php

class TrabajosController extends AppController {

    public $components = array('RequestHandler');
    public $layout = 'imprenta';
    public $uses = array('Trabajo', 'User', 'Imagene', 'Cliente', 'Insumo', 'Inventario', 'Tipo', 'Configuracione');

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow();
    }

    public function trabajo($idTrabajo = null) {
        $this->Trabajo->id = $idTrabajo;
        $this->request->data = $this->Trabajo->read();
        $imagenes = array();
        if(!empty($idTrabajo))
        {
            $imagenes = $this->Imagene->find('all',array('recursive' => -1,'order' => 'Imagene.id ASC','conditions' => array('Imagene.trabajo_id' => $idTrabajo)));
        }
        //debug($imagenes);exit;
        $papeles = $this->Insumo->find('list', array('fields' => 'Insumo.nombre', 'conditions' => array('Insumo.tipo_id' => 1)));
        $this->set(compact('clientes', 'papeles','imagenes','idTrabajo'));
    }
    
    public function guarda_trabajo() {
        if (!empty($this->request->data)) {
            /*debug($this->request->data);
            die;*/
            $this->request->data['Trabajo']['estado'] = 0;
            if (!empty($this->request->data['Cliente']['nombre'])) {
                $this->Cliente->create();
                $this->Cliente->save($this->request->data['Cliente']);
                $this->request->data['Trabajo']['cliente_id'] = $this->Cliente->getLastInsertID();
            }
            //debug($this->request->data);exit;
            $configuracion = $this->Configuracione->find('first');
            $costo = 0;
            if (!empty($configuracion)) {
                $costo = $this->request->data['Trabajo']['costo'] = $configuracion['Configuracione']['costocm'];
            }
            $this->Trabajo->create();
            $this->Trabajo->save($this->request->data['Trabajo']);
            
            if(!empty($this->request->data['Trabajo']['id']))
            {
                $idTrabajo = $this->request->data['Trabajo']['id'];
            }else{
                $idTrabajo = $this->Trabajo->getLastInsertID();
            }
            //debug($idTrabajo);exit;
            $this->Imagene->deleteAll(array('Imagene.trabajo_id' => $idTrabajo));
            foreach ($this->request->data['Imagen'] as $img) {
                $this->request->data['Adjunto'] = $img;
                $this->carga_adjunto($idTrabajo, $costo);
            }
            $this->Session->setFlash('Se registro correctamente el trabajo!!!', 'msgbueno');
            $this->redirect(array('action' => 'vista_trabajo', $idTrabajo));
        }
    }

    public function vista_trabajo($idTrabajo = NULL) {
        $trabajo = $this->Trabajo->findByid($idTrabajo);
        $imagenes = $this->Imagene->findAllBytrabajo_id($idTrabajo, NULL, array('Imagene.id ASC'), NULL, NULL, -1);
        $this->set(compact('imagenes', 'trabajo'));
        //debug($trabajo);exit;
        //debug($imagenes);exit;
    }

    public function carga_adjunto($idTrabajo = null, $costoh = NULL) {
        //debug($this->request->data);exit;
        
        if (TRUE) {
            $rutaImagen = $this->request->data['Adjunto']['nombre_url'];
            $tamanoImagen = $this->px2cm($rutaImagen, 300);
            $coloresCMYK = $this->coloresRgb($rutaImagen);
            //debug($tamanoImagen);die;
            /* debug($coloresCMYK['c']);
              debug($coloresCMYK['m']);
              debug($coloresCMYK['y']);
              debug($coloresCMYK['k']);
              exit(); */
            //debug($coloresCMYK);
            $c = $coloresCMYK['c'];
            $m = $coloresCMYK['m'];
            $y = $coloresCMYK['y'];
            $k = $coloresCMYK['k'];
            //debug($coloresEnRgb);
            //die;
            $this->request->data['Imagene']['url'] = $rutaImagen;
            $this->request->data['Imagene']['c'] = $c;
            $this->request->data['Imagene']['m'] = $m;
            $this->request->data['Imagene']['y'] = $y;
            $this->request->data['Imagene']['k'] = $k;
            $this->request->data['Imagene']['usado'] = $coloresCMYK['usado'];
            //$this->request->data['Imagene']['rgb'] = $coloresEnRgb;
            $this->request->data['Imagene']['base'] = $this->request->data['Adjunto']['base'];
            //$this->request->data['Imagene']['cantidad_imagenes'] = $this->request->data['Trabajo']['cantidad_imagenes'];
            $this->request->data['Imagene']['altura'] = $this->request->data['Adjunto']['altura'];
            $this->request->data['Imagene']['costo_hoja'] = ($this->request->data['Imagene']['altura'] * $this->request->data['Imagene']['base'] * ($coloresCMYK['usado'] / 100) * $costoh);
            //$this->request->data['Imagene']['porcentaje'] = $this->request->data['Adjunto']['porcentaje'];
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
        //debug($this->request->data);die;

        $trabajo = $this->Trabajo->find('first', array('recursive' => -1, 'conditions' => array('Trabajo.id' => $idTrabajo)));
        $ultimo_insumo = $this->Inventario->find('first', array('order' => 'Inventario.id DESC', 'recursive' => -1, 'conditions' => array('Inventario.insumo_id' => $trabajo['Trabajo']['insumo_id'])));
        if (!empty($ultimo_insumo)) {
            if ($ultimo_insumo['Inventario']['cantidad_total'] >= $trabajo['Trabajo']['cantidad']) {
                $this->Inventario->create();
                $this->request->data['Inventario']['insumo_id'] = $trabajo['Trabajo']['insumo_id'];
                $this->request->data['Inventario']['cantidad'] = $trabajo['Trabajo']['cantidad'];
                $this->request->data['Inventario']['tipo'] = 'Usado';
                $this->request->data['Inventario']['cantidad_total'] = $ultimo_insumo['Inventario']['cantidad_total'] - $trabajo['Trabajo']['cantidad'];
                $this->Inventario->save($this->request->data['Inventario']);

                $imagenes = $this->Imagene->find('all', array('conditions' => array('Imagene.trabajo_id' => $idTrabajo)));
                $total = 0.00;
                foreach ($imagenes as $ima) {
                    $total_img = 0.00;
                    $total_img = ($ima['Imagene']['costo_hoja'] + $ima['Imagene']['incremento']) * $trabajo['Trabajo']['cantidad'];
                    $total = $total + $total_img;
                }
                $this->Trabajo->id = $idTrabajo;
                $this->request->data['Trabajo']['estado'] = 1;
                $this->request->data['Trabajo']['precio_total'] = $total;
                $this->Trabajo->save($this->request->data['Trabajo']);
                $this->redirect(array('action' => 'nota_trabajo', $idTrabajo));
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
        $trabajo = $this->Trabajo->find('first', array('conditions' => array('Trabajo.id' => $idTrabajo), 'fields' => array(
                'Trabajo.id', 'Trabajo.descripcion', 'Cliente.nombre', 'Cliente.nit', 'Insumo.nombre', 'Trabajo.cantidad'
        )));
        $imagenes = $this->Imagene->find('all', array('conditions' => array('Imagene.trabajo_id' => $idTrabajo)));
        $this->set(compact('trabajo', 'imagenes'));
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

    public function pruebaimg() {
        $rutaImagen = 'imagenest' . DS . '54caaada-8c98-4647-b595-1234582ed5fd.jpg';
        $coloresCMYK = $this->coloresRgb($rutaImagen);
        debug($coloresCMYK);
        exit;
    }

    public function coloresRgb($imagen = null) {
        $img = imagecreatefromjpeg($imagen);
        $w = imagesx($img);
        $h = imagesy($img);
        $r = $g = $b = 0;
        $ci = $ma = $ye = $kl = 0;
        $numero_pixeles = $w * $h;
        $aux = 0;

        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                $rgb = imagecolorat($img, $x, $y);
                $r= $rgb >> 16;
                $g = $rgb >> 8 & 255;
                $b = $rgb & 255;
                if (($r == 255) && ($g == 255) && ($b == 255)) {
                    $aux++;
                }
                
                $cyan = 255 - $r;
                $magenta = 255 - $g;
                $yellow = 255 - $b;
                $black = min($cyan, $magenta, $yellow);
                
                $ci = $ci + @(($cyan - $black) / (255 - $black));
                $ma = $ma + @(($magenta - $black) / (255 - $black));
                $ye = $ye + @(($yellow - $black) / (255 - $black));
                $kl = $kl + $black/255;
            }
        }
        $total_c = $ci + $ma + $ye + $kl;
        /*debug($numero_pixeles);
        debug($ci);
        debug($ma);
        debug($ye);
        debug($kl);
        exit;*/
        //CANTIDAD DE TINTA SOBRE EL 100% DE DEL TOTAL USADO
        /*if($total_c != 0)
        {
            $array['c'] = ($ci * 100 / ($total_c));
            $array['m'] = ($ma * 100 / ($total_c));
            $array['y'] = ($ye * 100 / ($total_c));
            $array['k'] = ($kl * 100 / ($total_c));
        }  else {
            $array['c'] = $ci * 100;
            $array['m'] = $ma * 100;
            $array['y'] = $ye * 100;
            $array['k'] = $kl * 100;
        }*/
        //CANTIDAD DE TINTA REAL USADA NO AL 100%
        $array['c'] = $ci * 100/$numero_pixeles;
        $array['m'] = $ma * 100/$numero_pixeles;
        $array['y'] = $ye * 100/$numero_pixeles;
        $array['k'] = $kl * 100/$numero_pixeles;
        
        $total_usado = ($numero_pixeles - $aux) * (100 / $numero_pixeles);
        $array['usado'] = $total_usado;
        
        return $array;
    }

    private function hex2rgb($hex) {
        $color = str_replace('#', '', $hex);
        $rgb = array('r' => hexdec(substr($color, 0, 2)),
            'g' => hexdec(substr($color, 2, 2)),
            'b' => hexdec(substr($color, 4, 2)));
        return $rgb;
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

    public function index() {
        $trabajos = $this->Trabajo->find('all', array('order' => 'Trabajo.id DESC'));
        $this->set(compact('trabajos'));
    }

    private function px2cm($image, $dpi) {
        #Create a new image from file or URL
        $img = ImageCreateFromJpeg($image);

        #Get image width / height
        $x = ImageSX($img);
        $y = ImageSY($img);

        #Convert to centimeter
        $h = $x * 2.54 / $dpi;
        $l = $y * 2.54 / $dpi;

        #Format a number with grouped thousands
        $h = number_format($h, 2, ',', ' ');
        $l = number_format($l, 2, ',', ' ');

        #add size unit
        $px2cm[] = $h . "cm";
        $px2cm[] = $l . "cm";

        #return array w values
        #$px2cm[0] = X
        #$px2cm[1] = Y   
        return $px2cm;
    }
    
    public function sube_imagen()
    {
        $this->layout = 'ajax';
        
        $numero = $this->request->data['Trabajo']['numero_imagen'];
        $archivoImagen = $this->request->data['Imagen'][$numero]['imagen'];
        $nombreOriginal = $this->request->data['Imagen'][$numero]['imagen']['name'];
        //debug($archivoImagen['error']);exit;
        $nombre_tipo = explode(".", $nombreOriginal);
        //debug(end($nombre_tipo));exit;
        //debug(uniqid('', true));exit;
        $nombre = uniqid('', true) . "." . end($nombre_tipo);
        if ($this->guarda_archivo($archivoImagen, $nombre)){
            $array['nom_img'] = "imagenest/".$nombre;
            $merror = "";
        }else{
            $merror = "error";
        }
        
        $array['error'] = $merror;
        $this->respond($array, true);
        
    }
    function respond($message = null, $json = false)
    {
        if ($message != null)
        {
            if ($json == true)
            {
                $this->RequestHandler->setContent('json', 'application/json');
                $message = json_encode($message);
            }
            $this->set('message', $message);
        }
        $this->render('message');
    }

}
