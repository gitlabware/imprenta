
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Formulario de Docificacion</h4>
</div>
<?php echo $this->Form->create('Factura', array('action' => 'guardaparametro')); ?>
<div class="modal-body">

    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label for="field-1" class="control-label">NIT de la Empresa</label>
                <?php echo $this->Form->hidden('Parametrosfactura.id'); ?>
                <?php echo $this->Form->text('Parametrosfactura.nit', array('required', 'class' => 'form-control', 'type' => 'number')); ?>
            </div>	

        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label  class="control-label">Numero de Autorizacion</label>
                <?php echo $this->Form->text('Parametrosfactura.numero_autorizacion', array('class' => 'form-control', 'required', 'type' => 'number')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label  class="control-label">Llave de dosificacion</label>
                <?php echo $this->Form->text('Parametrosfactura.llave', array('class' => 'form-control', 'required')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label  class="control-label">Fecha Limite</label>
                <div class="input-group">
                    <?php echo $this->Form->date('Parametrosfactura.fechalimite',array('class' => 'form-control','required','placeholder' => 'dd-mm-yyyy'));?>
                    <div class="input-group-addon">
                        <a href="#"><i class="entypo-calendar"></i></a>
                    </div>
                </div>
                <?php //echo $this->Form->text('Parametrosfactura.fechalimite', array('class' => 'form-control', 'required')); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label  class="control-label">Numero Inicial</label>
                <?php echo $this->Form->text('Parametrosfactura.numero_ref', array('class' => 'form-control', 'required')); ?>
            </div>
        </div>
    </div>


</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-info">Registrar</button>
</div>
<?php echo $this->Form->end(); ?>

