


<?php echo $this->Form->create('User', array('class' => 'form-horizontal form-bordered form-control-borderless', 'id' => 'form_login')); ?>
<div class="form-group">

    <div class="input-group">

        <div class="input-group-addon">
            <i class="entypo-user"></i>    
        </div>
        <?php echo $this->Form->text('username', array('class' => 'form-control', 'placeholder' => 'Nombre de Usuario', 'autocomplete' => 'off', 'required')); ?>
    </div>

</div>

<div class="form-group">

    <div class="input-group">
        <div class="input-group-addon">
            <i class="entypo-key"></i>
        </div>
        <?php echo $this->Form->password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'autocomplete' => 'off', 'required')); ?>
    </div>

</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block btn-login">
        <i class="entypo-login"></i>
        Ingresar
    </button>
</div>