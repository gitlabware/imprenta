<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title">Formulario de Tipos de Insumo</h4>
</div>
<?php //debug($insumos); ?>
<?php echo $this->Form->create('Tipo'); ?>
<div class="modal-body">

  <div class="row">
    <div class="col-md-12">

      <div class="form-group">
        <label for="field-1" class="control-label">Nombre</label>
         <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'placeholder' => 'Ingrese el nombre', 'required')); ?>
      </div>

    </div>
  </div>

</div>

<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-info">Registrar</button>
</div>
<?php echo $this->Form->end(); ?>