
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Busque el cliente</h4>
</div>
<?php echo $this->Form->create('Trabajo', array('id' => 'idformcombo1')); ?>
<div class="modal-body">

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Nombre del cliente</label>
            </div>
        </div>
        <div class="col-md-8">

            <div class="form-group">
                <?php echo $this->Form->text('Cliente.nombre', array('class' => 'form-control', 'placeholder' => 'Ingrese el nombre del cliente', 'id' => 'combobuscaclientetext')); ?>
            </div>	

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="listadocomboclientes">

            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-info" onclick="jQuery('#<?php echo $div;?>').load('<?php echo $this->Html->url(array('action' => 'comboclientes3',$campoform,$div,NULL));?>');jQuery('#modalimprentados').modal('toggle');">NINGUNO</button>
</div>
<script>
    jQuery(document).ready(function () {
        jQuery("#idformcombo1").submit(function () {
            return false;
        });
    });
    jQuery('#combobuscaclientetext').keyup(function () {
        var postData = jQuery(this).serializeArray();
        var formURL = "<?php echo $this->Html->url(array('action' => 'comboclientes2', $campoform, $div));?>";
        jQuery.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    /*beforeSend:function (XMLHttpRequest) {
                     alert("antes de enviar");
                     },
                     complete:function (XMLHttpRequest, textStatus) {
                     alert('despues de enviar');
                     },*/
                    success: function (data, textStatus, jqXHR)
                    {
                        //data: return data from server
                        jQuery("#listadocomboclientes").html(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        //if fails   
                        alert("error");
                    }
                });
    });
</script>

<?php echo $this->Form->end(); ?>
