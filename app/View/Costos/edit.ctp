<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Formulario de Costos</h4>
</div>
<?php echo $this->Form->create('Costo');?>
<div class="modal-body">

    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label for="field-1" class="control-label">Nombre</label>
                <?php echo $this->Form->hidden('id')?>
                <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'placeholder' => 'Ingrese el nombre', 'required')); ?>
            </div>	

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label for="field-3" class="control-label">Precio de compra</label>
                <?php echo $this->Form->text('preciocompra', array('class' => 'form-control', 'placeholder' => 'Ingrese el precio de compra','required', 'type'=>'number', 'step'=>'any')); ?>
            </div>	

        </div>
    </div>

    <div class="row">
        <div class="col-md-4">

            <div class="form-group">
                <label for="field-4" class="control-label">Rendimiento</label>
                <?php echo $this->Form->text('rendimiento', array('class' => 'form-control', 'placeholder' => 'Ingrese el rendimiento', 'required', 'type'=>'number', 'min'=>1)); ?>
            </div>	

        </div>

    </div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-info">Registrar</button>
</div>
<?php echo $this->Form->end();?>
