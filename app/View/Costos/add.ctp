<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title">Formulario de Costos</h4>
</div>
<?php //debug($insumos); ?>
<?php echo $this->Form->create('Costo'); ?>
<div class="modal-body">

  <div class="row">
    <div class="col-md-12">

      <div class="form-group">
        <label for="field-1" class="control-label">Nombre</label>
        <?php //echo $this->Form->select('insumo_id',array('toner negro'=>'toner negro'),array('class' => 'form-control', 'required')); ?>
        <select name="data[Costo][insumo_id]" class="form-control" data-allow-clear="true" data-placeholder="Select one city...">
          <?php foreach ($insumos as $i): ?>
            <option value="<?php echo $i['Insumo']['id']; ?>"><?php echo $i['Insumo']['nombre']; ?> (<?php echo $i['Insumo']['descripcion']; ?>)</option>
          <?php endforeach; ?>
        </select>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-md-6">

      <div class="form-group">
        <label for="field-3" class="control-label">Precio de lista</label>
        <?php echo $this->Form->text('preciocompra', array('class' => 'form-control', 'placeholder' => 'Ej: 1625', 'required', 'type' => 'number', 'step' => 'any')); ?>        
      </div>

    </div>

    <div class="col-md-6">

      <div class="form-group">
        <label for="field-4" class="control-label">Rendimiento</label>
        <?php echo $this->Form->text('rendimiento', array('class' => 'form-control', 'placeholder' => 'Ej: 30000', 'required', 'type' => 'number', 'min' => 1)); ?>
      </div>

    </div>
  </div>

</div>

<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-info">Registrar</button>
</div>
<?php echo $this->Form->end(); ?>