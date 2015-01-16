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
                <?php echo $this->Form->create('Trabajo', array('action' => 'guarda_trabajo', 'class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'), array('type' => 'file')); ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Cliente</label>
                    <div class="col-sm-5">
                        <?php echo $this->Form->select('cliente_id', $clientes, array('class' => 'form-control')) ?>
                    </div>
                </div>
                <div class="form-group" id="form-imagen-0">
                    <label class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-5">
                        <?php echo $this->Form->text('descripcion', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese alguna descripcion del trabajo')) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <a class="btn btn-primary btn-block" onclick="add_imagen();"><i class="entypo-plus"></i>Add Imagen</a>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-danger btn-block" onclick="quita_imagen();"><i class="entypo-cancel"></i>Quitar Imagen</a>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-success btn-block"><i class="entypo-check"></i>Registrar</button>
                    </div>
                </div>

                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Html->script(array('fileinput.js'), array('block' => 'scriptadd')); ?>

<script>
    var cantimagenes = 0;

    var bloqueimagen = '';
    add_imagen();
    function add_imagen()
    {
        cantimagenes++;
        bloqueimagen =
                '<div class="form-group" id="form-imagen-' + cantimagenes + '">'
                + '<label class="col-sm-2 control-label">Image Upload</label>'
                + ' <div class="col-sm-4">'
                + '     <div class="fileinput fileinput-new" data-provides="fileinput">'
                + '         <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput"><img src="http://placehold.it/200x150" alt="..."></div>'
                + '         <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>'
                + '         <div>'
                + '             <span class="btn btn-white btn-file">'
                + '                 <span class="fileinput-new">Select image</span>'
                + '                 <span class="fileinput-exists">Change</span>'
                + '                 <input type="file" name="data[Imagen][' + cantimagenes + '][imagen]" accept="image/*" required>'
                + '             </span>'
                + '             <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>'
                + '         </div>'
                + '     </div>'
                + ' </div>'
                + ' <div class="col-sm-6">'
                + '     <div class="row">'
                + '         <label class="col-sm-4 control-label">Cantidad</label>'
                + '         <div class="col-sm-8">'
                + '             <input type="number" class="form-control" placeholder="Ingrese la cantidad" min="1" required name="data[Imagen][' + cantimagenes + '][cantidad]">'
                + '         </div>'
                + '     </div>'
                + '     <br>'
                + '     <div class="row">'
                + '         <label class="col-sm-4 control-label">Cantidad Imagenes</label>'
                + '         <div class="col-sm-8">'
                + '             <input type="number" class="form-control" placeholder="Ingrese la cantidad de imagenes" min="1" required name="data[Imagen][' + cantimagenes + '][cantidad_imagenes]">'
                + '         </div>'
                + '     </div>'
                + ' </div>'
                + '</div>';

        cantidad = cantimagenes - 1;

        jQuery('#form-imagen-' + cantidad).after(bloqueimagen);
    }
    function quita_imagen()
    {
        if (cantimagenes != 0) {
            jQuery('#form-imagen-' + cantimagenes).remove();
            cantimagenes--;
        }
    }
    
</script>