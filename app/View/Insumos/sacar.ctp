<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Salida de producto <?php echo $insumo['Insumo']['nombre'];?></h4>
    
</div>
<?php echo $this->Form->create('Insumo',array('action'=>'registrasalida'));?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-1" class="control-label">Cantidad</label>
                <?php echo $this->Form->hidden('Inventario.precio',array('value'=>$insumo['Insumo']['precio']))?>
                <?php echo $this->Form->hidden('Inventario.cantidadu',array('value'=>$insumo['Insumo']['cantidad']))?>
                <?php echo $this->Form->hidden('Inventario.insumo_id',array('value'=>$insumo['Insumo']['id']))?>
                <?php echo $this->Form->hidden('Inventario.tipo',array('value'=>'Salida'))?>
                <?php echo $this->Form->text('Inventario.cantidad', array('class' => 'form-control', 'placeholder' => 'Ingrese la cantidad', 'type'=>'number','min'=>1,'required')); ?>
            </div>
            <div class="form-group">
                <label for="field-1" class="control-label">Observacion</label>
                <?php echo $this->Form->textarea('Inventario.observacion',array('class' => 'form-control','placeholder' => 'Ingrese su observacion','required'));?>
            </div>
        </div>
    </div>     
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-info">Registrar</button>
</div>
<?php echo $this->Form->end();?>