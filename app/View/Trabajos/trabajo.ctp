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
                <?php echo $this->Form->create('Trabajo', array('action' => 'guarda_trabajo', 'class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data', 'id' => 'formtrabajo'), array('type' => 'file')); ?>
                <?php echo $this->Form->hidden('id');?>
                <div class="form-group" id="idseleccli">
                    <label class="col-sm-3 control-label">Cliente</label>
                    <div class="col-sm-5">
                        <div id="divselectcliente">
                            <button type="button" class="btn btn-primary btn-block" onclick="cargarmodal2('<?php echo $this->Html->url(array('action' => 'comboclientes1', 'Trabajo.cliente_id', 'divselectcliente')); ?>');">
                            <?php 
                            if(empty($this->request->data['Trabajo']['cliente_id'])){
                                echo 'SELECCIONE AL CLIENTE';
                            }else{
                                echo $this->request->data['Cliente']['nombre'];
                            }
                            ?>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-success"  onclick="jQuery('#idseleccli').toggle(400);
                                jQuery('#idnuevocli').toggle(400);
                                jQuery('#idclinom').attr('required', true);
                                jQuery('#idclinit').attr('required', true);">NUEVO</button>
                    </div>
                </div>
                <div class="form-group" style="display: none;" id="idnuevocli">
                    <label class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-4">
                        <?php echo $this->Form->text('Cliente.nombre', array('class' => 'form-control', 'id' => 'idclinom', 'placeholder' => 'Ingrese nombre del cliente','value' => '')); ?>
                    </div>
                    <label class="col-sm-2 control-label">NIT/CI</label>
                    <div class="col-sm-2">
                        <?php echo $this->Form->text('Cliente.nit', array('class' => 'form-control', 'id' => 'idclinit', 'placeholder' => 'Ingrese nit o ci del cliente','value' => '')); ?>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-info" onclick="jQuery('#idnuevocli').toggle(400);
                                jQuery('#idseleccli').toggle(400);
                                jQuery('#idclinom').attr('required', false);
                                jQuery('#idclinit').attr('required', false);">SELECCIONAR</button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Descripcion</label>
                    <div class="col-sm-4">
                        <?php echo $this->Form->text('descripcion', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese alguna descripcion del trabajo')) ?>
                    </div>
                    <label class="col-sm-2 control-label">Cantidad</label>
                    <div class="col-sm-2">
                        <?php echo $this->Form->text('cantidad_imagenes', array('class' => 'form-control', 'id' => 'idclinit', 'placeholder' => 'Ingrese nit o ci del cliente', 'type' => 'number')); ?>
                    </div>                                        
                </div>
                <div class="form-group" id="form-imagen-0">
                    <label class="col-sm-2 control-label">Tipo de papel</label>
                    <div class="col-sm-4">
                        <?php echo $this->Form->select('insumo_id', $papeles, array('class' => 'form-control', 'required')) ?>
                    </div>
                    <label class="col-sm-2 control-label">Cantidad de papel</label>
                    <div class="col-sm-2">
                        <?php echo $this->Form->text('cantidad', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese la cantidad de papel', 'type' => 'number', 'min' => 1)) ?>
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
                        <button class="btn btn-success btn-block" id="idregistrar" ><i class="entypo-check"></i>Registrar</button>
                    </div>
                </div>
                <?php echo $this->Form->hidden('numero_imagen', array('id' => 'idnumero_imagen')); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<div id="parte">

</div>
<?php echo $this->Html->script(array('fileinput.js'), array('block' => 'scriptadd')); ?>

<script>
    var urlcargando = '<?php echo $this->webroot.'img/Circulo-Carga-62157.gif'?>';
    var cantimagenes = 0;

    var bloqueimagen = '';
    <?php if(empty($idTrabajo)):?>
        add_imagen();
    <?php else:?>
        <?php foreach($imagenes as $img):?>
                //cantimagenes++;
                add_imagen();
                jQuery('#inp-'+cantimagenes).attr('required',false);
                jQuery('#idimgsrc'+cantimagenes).attr('src','<?php echo $this->webroot.$img['Imagene']['url'];?>');
                jQuery('#idbase'+cantimagenes).val('<?php echo $img['Imagene']['base']?>');
                jQuery('#idaltura'+cantimagenes).val('<?php echo $img['Imagene']['altura']?>');
                jQuery('#urlnom'+cantimagenes).val('<?php echo $img['Imagene']['url']?>');
        <?php endforeach;?>
    <?php endif;?>
    
    function add_imagen()
    {
        cantimagenes++;
        bloqueimagen =
                '<div class="form-group" id="form-imagen-' + cantimagenes + '">'
                + '<label class="col-sm-2 control-label">Cargado de Imagenes # ' + cantimagenes + '</label>'
                + ' <div class="col-sm-4">'
                + '     <div class="fileinput fileinput-new" data-provides="fileinput">'
                + '         <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput"><img id="idimgsrc'+cantimagenes+'" src="http://placehold.it/200x150" alt="..."></div>'
                + '         <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>'
                + '         <div>'
                + '             <span class="btn btn-white btn-file">'
                + '                 <span class="fileinput-new">Seleecionar Imagen</span>'
                + '                 <span class="fileinput-exists">Cambiar</span>'
                + '                 <input type="file" id="inp-' + cantimagenes + '" name="data[Imagen][' + cantimagenes + '][imagen]" accept="image/*" required>'
                + '             </span>'
                + '             <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Eliminar</a>'
                + '         </div>'
                + '     </div>'
                + ' </div>'
                + ' <div class="col-sm-6">'
                + '     <div class="row">'
                + '         <label class="col-sm-4 control-label">Base</label>'
                + '         <div class="col-sm-8">'
                + '             <input type="number" step="any" id="idbase'+cantimagenes+'" class="form-control" placeholder="Ingrese la cantidad" min="1" required name="data[Imagen][' + cantimagenes + '][base]">'
                + '         </div>'
                + '     </div>'
                + '     <br>'
                + '     <div class="row">'
                + '         <label class="col-sm-4 control-label">Altura</label>'
                + '         <div class="col-sm-8">'
                + '             <input type="number" step="any" id="idaltura'+cantimagenes+'" class="form-control" placeholder="Ingrese la cantidad de imagenes" min="1" required name="data[Imagen][' + cantimagenes + '][altura]">'
                + '             <input type="hidden" name="data[Imagen][' + cantimagenes + '][nombre_url]" id="urlnom'+cantimagenes+'">'
                + '         </div>'
                + '     </div>'
                + '     <br>'
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
    function sube_imagen(numeroimg, e, re, preview, element, file)
    {
        jQuery('#idregistrar').attr('disabled',true);
        jQuery('#idnumero_imagen').val(numeroimg);
        //alert(jQuery('#formtrabajo')[0].files[0]);
        //alert(fileimg.files[0].type);
        var datosimg = new FormData(jQuery('#formtrabajo')[0]);
        
        //datosimg.append("persona",array);
        //datosimg.append('file', fileimg);
        jQuery.ajax({
            url: '<?php echo $this->Html->url(array('controller' => 'Trabajos', 'action' => 'sube_imagen')); ?>',
            type: 'POST',
            data: datosimg,
            cache: false,
            //dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function (data, textStatus, jqXHR)
            {
                //jQuery("#parte").html(data);
                if (jQuery.parseJSON(data).error != '')
                {
                    
                } else {
                    var idnomurl = '#urlnom'+numeroimg+'';
                    jQuery(idnomurl).val(jQuery.parseJSON(data).nom_img);
                    setTimeout(function ()
                    {
                        var $img = jQuery('<img>').attr('src', re.target.result);
                        e.target.files[0].result = re.target.result;

                        element.find('.fileinput-filename').text(file.name);

                        // if parent has max-height, using `(max-)height: 100%` on child doesn't take padding and border into account
                        if (preview.css('max-height') != 'none')
                            $img.css('max-height', parseInt(preview.css('max-height'), 10) - parseInt(preview.css('padding-top'), 10) - parseInt(preview.css('padding-bottom'), 10) - parseInt(preview.css('border-top'), 10) - parseInt(preview.css('border-bottom'), 10));

                        preview.html($img);
                        element.addClass('fileinput-exists').removeClass('fileinput-new');

                        element.trigger('change.bs.fileinput', e.target.files);
                        jQuery('#idregistrar').attr('disabled',false);
                    }, 1000)
                }

                /*if (typeof data.error === 'undefined')
                 {
                 // Success so call function to process the form
                 //submitForm(event, data);
                 }
                 else
                 {
                 // Handle errors here
                 //console.log('ERRORS: ' + data.error);
                 }*/
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

                // Handle errors here
                //console.log('ERRORS: ' + textStatus);
                alert("Error");
                // STOP LOADING SPINNER
            }
        });

    }

</script>
