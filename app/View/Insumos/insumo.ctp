<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">formulario de insumos</h4>
</div>
<?php echo $this->Form->create('Insumo',array('action'=>'guardarinsumo'));?>
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
                <label for="field-3" class="control-label">Descripcion</label>
                <?php echo $this->Form->text('descripcion', array('class' => 'form-control', 'placeholder' => 'Ingrese una descripcionsl')); ?>
            </div>	

        </div>
    </div>
    <div class="row">
        <div class="col-md-4">

            <div class="form-group">
                <label for="field-4" class="control-label">Tipo</label>
                <?php echo $this->Form->select('tipo', array('Papel' => 'Papel'),array('class'=>'form-control', 'required')); ?>
            </div>	

        </div>

        <div class="col-md-4">

            <div class="form-group">
                <label for="field-5" class="control-label">Precio</label>
                <?php echo $this->Form->text('precio', array('class' => 'form-control', 'placeholder' => 'precio', 'required','type'=>'number','min'=>0)); ?>
            </div>	

        </div>

        <div class="col-md-4">

            <div class="form-group">
                <label for="field-6" class="control-label">Cantidad</label>
                <?php echo $this->Form->text('cantidad', array('class' => 'form-control','placeholder'=>'registre la cantidad','required', 'type'=>'number','min'=>1)); ?>
            </div>	

        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-info">Registrar</button>
</div>
<?php echo $this->Form->end();?>