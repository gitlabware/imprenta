<?php

App::import('Vendor', 'CodigoControl', array('file' => 'CodigoControl.php'));

class FacturasController extends AppController {

    public $uses = array('Factura');
    public $layout = 'imprenta';

    public function index() {
        
    }

    public function genera_factura() {
        
        $nuevocodigo = new CodigoControl($autoriza, $idfactura, $nitcliente, $nueva_fecha, $rtotal, $llave);
        $codigo = $nuevocodigo->generar();
    }
    public function ver_factura()
    {
        $literaltotal = '';
        $trabajos = array();
        $this->set(compact('trabajos','literaltotal'));
    }
    
}
