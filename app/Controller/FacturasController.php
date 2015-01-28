<?php
App::import('Vendor', 'CodigoControlV7', array('file' => 'CodigoControlV7.php'));

class FacturasController extends AppController {

    public $uses = array('Factura', 'Parametrosfactura', 'Trabajo');
    public $layout = 'imprenta';
    public $components = array('Montoliteral');
    
    public function index() {
        $facturas = $this->Factura->find('all');
        $this->set(compact('facturas'));
    }

    public function ver_factura() {
        
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

    public function listaparametros() {
        $parametros = $this->Parametrosfactura->find('all');
        $this->set(compact('parametros'));
    }

    public function genera_factura($idTrabajo = null) {
        $trabajo = $this->Trabajo->find('first', array('conditions' => array('Trabajo.id' => $idTrabajo)));
        //debug($trabajo);exit;
        if (!empty($trabajo['Cliente']) && !empty($trabajo['Trabajo'])) {
            $nitcliente = $trabajo['Cliente']['nit'];
            $totalt = $trabajo['Trabajo']['precio_total'];
            $cliente = $trabajo['Cliente']['nombre'];
            $total = number_format($totalt, 2, '.', '');
            $monto = split('\.', $total);
            $literaltotal = $this->Montoliteral->getMontoLiteral($monto[0]);
            $nuevocodigo = new CodigoControlV7();
            $datoscodigo = $nuevocodigo->datosgenera($nitcliente, $total,"Imprenta Praver",$cliente);
            if (!empty($datoscodigo))
            {
                $this->Trabajo->id = $idTrabajo;
                $this->request->data['Trabajo']['estado'] = 'Facturado';
                $this->Trabajo->save($this->request->data['Trabajo']);
            }  else {
                $this->Session->setFlash('No se pudo generar la factura!!','msgerror');
                $this->redirect($this->referer());
            }
            $this->set(compact('literaltotal','datoscodigo','cliente','nitcliente','trabajo'));
        }  else {
            $this->Session->setFlash('El trabajo no existe!!','msgerror');
            $this->redirect($this->referer());
        }
    }

}
