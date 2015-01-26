<?php

App::import('Vendor', 'CodigoControl', array('file' => 'CodigoControl.php'));

class FacturasController extends AppController {

    public $uses = array('Factura', 'Parametrosfactura', 'Trabajo');
    public $layout = 'imprenta';

    public function index() {
        
    }

    public function ver_factura() {
        $literaltotal = '';
        $trabajos = array();
        $this->set(compact('trabajos', 'literaltotal'));
    }

    public function parametrofactura($idParametro = null) {
        $this->layout = 'ajax';
        //debug($var)
        $this->Parametrosfactura->id = $idParametro;
        $this->request->data = $this->Parametrosfactura->read();

        if (empty($this->request->data['Parametrosfactura']['numero_ref'])) {
            $u_factura = $this->Factura->find('first', array('order' => 'Factura.id DESC'));
            if (!empty($u_factura)) {
                $this->request->data['Parametrosfactura']['numero_ref'] = $u_factura['Factura']['numero'] + 1;
            } else {
                $this->request->data['Parametrosfactura']['numero_ref'] = 1;
            }
        }
    }

    public function guardaparametro() {
        if (!empty($this->request->data)) {
            $this->Parametrosfactura->create();
            $this->Parametrosfactura->save($this->request->data['Parametrosfactura']);
            $this->Session->setFlash('Se registro correctamente!!!', 'msgbueno');
        }
        $this->redirect(array('action' => 'listaparametros'));
    }

    public function prueba() {
        $this->layout = 'ajax';
    }

    public function listaparametros() {
        $parametros = $this->Parametrosfactura->find('all');
        $this->set(compact('parametros'));
    }

    private function genera_factura($idTrabajo = null) {
        $trabajo = $this->Trabajo->find('all', array('conditions' => array('Trabajo.id' => $idTrabajo)));
        if (!empty($trabajo)) {
            $nuevocodigo = new CodigoControl($autoriza, $idfactura, $nitcliente, $nueva_fecha, $rtotal, $llave);
            $codigo = $nuevocodigo->generar();
        }
    }

}
