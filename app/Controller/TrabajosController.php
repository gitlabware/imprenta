<?php
class TrabajosController extends AppController
{
    public $layout = 'imprenta';
    public $uses = array('Trabajo','User','Imagene');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    public function trabajo()
    {
        $clientes = $this->User->find('list',array('fields' => 'User.nombre','conditions' => array('User.role' => 'Cliente')));
        $this->set(compact('clientes'));
    }
    public function guarda_trabajo()
    {
        if(!empty($this->request->data))
        {
            //debug($this->request->data);exit;
            $this->Trabajo->create();
            $this->Trabajo->save($this->request->data['Trabajo']);
            $idTrabajo = $this->Trabajo->getLastInsertID();
            foreach ($this->request->data['Imagen'] as $img)
            {
                $this->request->data['Adjunto'] = $img;
                $this->carga_adjunto($idTrabajo);
            }
            $this->Session->setFlash('Se registro correctamente el trabajo!!!','msgbueno');
            $this->redirect(array('action' => 'vista_trabajo',$idTrabajo));
        }
    }
    
    public function vista_trabajo($idTrabajo = NULL)
    {
        $trabajo = $this->Trabajo->findByid($idTrabajo);
        $imagenes = $this->Imagene->findAllBytrabajo_id($idTrabajo,NULL,NULL,NULL,NULL,-1);
        $this->set(compact('imagenes','trabajo'));
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
            $this->request->data['Imagene']['url'] = 'imagenest' . DS . $nombre;
            $this->request->data['Imagene']['cantidad'] = $this->request->data['Adjunto']['cantidad'];
            $this->request->data['Imagene']['cantidad_imagenes'] = $this->request->data['Adjunto']['cantidad_imagenes'];
            $this->request->data['Imagene']['trabajo_id'] = $idTrabajo;
            $this->Imagene->create();
            $this->Imagene->save($this->request->data['Imagene']);
        }  else {
            $this->Trabajo->delete($idTrabajo);
            $this->Imagene->deleteAll(array('Imagene.trabajo_id'));
            $this->Session->setFlash('Ocurrio un error con la imagen '.$nombreOriginal.', intente nuevamente','msgerror');
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
    public function genera_trabajo($idTrabajo = null)
    {
        
        debug($idTrabajo);exit;
    }
    
    public function comboclientes1($campoform = null, $div = null) {
        $this->layout = 'ajax';
        //debug($campoform);exit;
        $this->set(compact('campoform', 'div'));
    }

    public function comboclientes2($campoform = null, $div = null) {
        $this->layout = 'ajax';
        //debug($this->request->data);exit;
        if (!empty($this->request->data['Mascota']['nombre_completo'])) {
            $listamascotas = $this->Mascota->find('all', array('recursive' => -1,
                'conditions' =>
                array('Mascota.nombre_completo LIKE' => '%' . $this->request->data['Mascota']['nombre_completo'] . "%"),
                'limit' => 8,
                'order' => 'Mascota.nombre_completo ASC'
            ));
        }
        //debug($listamascotas);exit;
        $this->set(compact('listamascotas', 'div', 'campoform'));
    }

    public function comboclientes3($campoform = null, $div = null, $idMascota = null) {
        $this->layout = 'ajax';
        $smascota = $this->Mascota->findByid($idMascota, null, null, -1);
        $this->set(compact('campoform', 'smascota', 'div'));
    }
    
}