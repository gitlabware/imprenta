<?php echo $this->Form->create('Inventario',array('action' => 'guarda_inventario'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        <?php 
        if($tipo == 1)
        {
            $movimiento = "Ingreso";
            echo $this->Form->hidden('tipo',array('value' => 'Ingreso'));
        }  else {
            $movimiento = "Salida";
            echo $this->Form->hidden('tipo',array('value' => 'Salida'));
        }
        if(!empty($idInsumo))
        {
            echo "$movimiento de ".$insumos[$idInsumo];
            echo $this->Form->hidden('insumo_id');
        }else{
            echo "$movimiento";
        }
        ?>
    </h4>
</div>

<div class="modal-body">
    <?php if(empty($idInsumo)):?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label  class="control-label">Nombre</label>
                <?php echo $this->Form->select('insumo_id',$insumos,array('class' => 'form-control','required'));?>
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label for="field-3" class="control-label">Cantidad</label>
                <?php echo $this->Form->text('cantidad',array('class' => 'form-control','required','type' => 'number','min' => 0,'placeholder' => 'Ingrese la cantidad','value' => 1));?>
            </div>	

        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-info">Registrar</button>
</div>
<?php echo $this->Form->end();?>


