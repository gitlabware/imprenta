<script src="<?php echo $this->webroot; ?>js/jquery-1.11.0.min.js"></script>
<div class="row">
    <div class="col-md-12">
        <div id="divprueba">
            <div class="form-group">
                <label class="col-sm-3 control-label">Date</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="eees"/>
                    <br />
                    <input type="text" class="form-control" data-mask="d/m/y" />
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    jQuery('#divprueba').load('<?php echo $this->Html->url(array('action' => 'prueba')); ?>', function () {

    });
</script>
