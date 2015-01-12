
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Formulario de Usuario</h4>
</div>
<?php echo $this->Form->create('User',array('action'=>'guardarusuario'));?>
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
                <label for="field-3" class="control-label">Email</label>
                <?php echo $this->Form->text('email', array('class' => 'form-control', 'placeholder' => 'Ingrese el  Email')); ?>
            </div>	

        </div>
    </div>

    <div class="row">
        <div class="col-md-4">

            <div class="form-group">
                <label for="field-4" class="control-label">Nombre de Usuario</label>
                <?php echo $this->Form->text('username', array('class' => 'form-control', 'placeholder' => 'Ingrese nombre de Usuario', 'required')); ?>
            </div>	

        </div>

        <div class="col-md-4">

            <div class="form-group">
                <label for="field-5" class="control-label">Contraseña</label>
                <?php echo $this->Form->password('password', array('class' => 'form-control', 'placeholder' => 'Contraseña de usuario', 'required','value'=>'')); ?>
            </div>	

        </div>

        <div class="col-md-4">

            <div class="form-group">
                <label for="field-6" class="control-label">Tipo</label>
                <?php echo $this->Form->select('role', array('Administrador' => 'Administrador'), array('class' => 'form-control', 'required')); ?>
            </div>	

        </div>
    </div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-info">Registrar</button>
</div>
<?php echo $this->Form->end();?>
