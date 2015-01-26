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
                <div class="form-group" id="idseleccli">
                    <label class="col-sm-3 control-label">Cliente</label>
                    <div class="col-sm-5">
                        <div id="divselectcliente">
                            <button type="button" class="btn btn-primary btn-block" onclick="cargarmodal2('<?php echo $this->Html->url(array('action' => 'comboclientes1','Trabajo.cliente_id','divselectcliente'));?>');">SELECCIONE AL CLIENTE</button>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-success"  onclick="jQuery('#idseleccli').toggle(400);jQuery('#idnuevocli').toggle(400);jQuery('#idclinom').attr('required',true);jQuery('#idclinit').attr('required',true);">NUEVO</button>
                    </div>
                </div>
                <div class="form-group" style="display: none;" id="idnuevocli">
                    <label class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-4">
                        <?php echo $this->Form->text('Cliente.nombre',array('class' => 'form-control','id' => 'idclinom','placeholder' => 'Ingrese nombre del cliente'));?>
                    </div>
                    <label class="col-sm-2 control-label">NIT/CI</label>
                    <div class="col-sm-2">
                        <?php echo $this->Form->text('Cliente.nit',array('class' => 'form-control','id' => 'idclinit','placeholder' => 'Ingrese nit o ci del cliente'));?>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-info" onclick="jQuery('#idnuevocli').toggle(400);jQuery('#idseleccli').toggle(400);jQuery('#idclinom').attr('required',false);jQuery('#idclinit').attr('required',false);">SELECCIONAR</button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Descripcion</label>
                    <div class="col-sm-4">
                        <?php echo $this->Form->text('descripcion', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese alguna descripcion del trabajo')) ?>
                    </div>
                    <label class="col-sm-2 control-label">Cantidad</label>
                    <div class="col-sm-2">
                        <?php echo $this->Form->text('cantidad_imagenes',array('class' => 'form-control','id' => 'idclinit','placeholder' => 'Ingrese nit o ci del cliente', 'type'=>'number'));?>
                    </div>                                        
                </div>
                <div class="form-group" id="form-imagen-0">
                    <label class="col-sm-2 control-label">Tipo de papel</label>
                    <div class="col-sm-4">
                        <?php echo $this->Form->select('insumo_id', $papeles,array('class' => 'form-control', 'required')) ?>
                    </div>
                    <label class="col-sm-2 control-label">Cantidad de papel</label>
                    <div class="col-sm-2">
                        <?php echo $this->Form->text('cantidad', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese la cantidad de papel','type' => 'number','min' => 1)) ?>
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
                + '<label class="col-sm-2 control-label">Cargado de Imagenes # '+ cantimagenes +'</label>'
                + ' <div class="col-sm-4">'
                + '     <div class="fileinput fileinput-new" data-provides="fileinput">'
                + '         <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput"><img src="http://placehold.it/200x150" alt="..."></div>'
                + '         <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>'
                + '         <div>'
                + '             <span class="btn btn-white btn-file">'
                + '                 <span class="fileinput-new">Seleecionar Imagen</span>'
                + '                 <span class="fileinput-exists">Cambiar</span>'
                + '                 <input type="file" name="data[Imagen][' + cantimagenes + '][imagen]" accept="image/*" required>'
                + '             </span>'
                + '             <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Eliminar</a>'
                + '         </div>'
                + '     </div>'
                + ' </div>'
                + ' <div class="col-sm-6">'
                + '     <div class="row">'
                + '         <label class="col-sm-4 control-label">Base</label>'
                + '         <div class="col-sm-8">'
                + '             <input type="number" class="form-control" placeholder="Ingrese la cantidad" min="1" required name="data[Imagen][' + cantimagenes + '][base]">'
                + '         </div>'
                + '     </div>'
                + '     <br>'
                + '     <div class="row">'
                + '         <label class="col-sm-4 control-label">Altura</label>'
                + '         <div class="col-sm-8">'
                + '             <input type="number" class="form-control" placeholder="Ingrese la cantidad de imagenes" min="1" required name="data[Imagen][' + cantimagenes + '][altura]">'
                + '         </div>'
                + '     </div>'
                + '     <br>'
                + '     <div class="row">'
                + '         <label class="col-sm-4 control-label">Porcentaje Impresion</label>'
                + '         <div class="col-sm-8">'
                + '             <input type="number" class="form-control" placeholder="Ingrese la cantidad de imagenes" min="1" required name="data[Imagen][' + cantimagenes + '][porcentaje]">'
                + '         </div>'
                + '     </div>'
                + ' </div>'
                + '</div>';

        cantidad = cantimagenes - 1;

        jQuery('#form-imagen-' + cantidad).after(bloqueimagen);
    }
    
    function quita_imagen()
    {
        if (cantimagenes != 1) {
            jQuery('#form-imagen-' + cantimagenes).remove();
            cantimagenes--;
        }
    }
    
</script>