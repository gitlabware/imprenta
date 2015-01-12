<h2>REGISTRO DE TRABAJO</h2>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Formulario de trabajo
                </div>
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('Trabajo', array('action' => 'guarda_trabajo', 'class' => 'form-horizontal form-groups-bordered')); ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Cliente</label>
                    <div class="col-sm-5">
                        <?php echo $this->Form->select('cliente_id', $clientes, array('class' => 'form-control', 'required')) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-5">
                        <?php echo $this->Form->text('descripcion', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese alguna descripcion del trabajo')) ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Image Upload</label>

                    <div class="col-sm-5">

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                <img src="http://placehold.it/200x150" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="..." accept="image/*">
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>

                    </div>
                </div>

                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>