
<div class="form-group">
    <label class="col-sm-3 control-label">Date</label>
    <div class="col-sm-5">
        <input type="text" class="form-control eynar" data-mask="date" />
        <br />
        <input type="text" class="form-control" data-mask="d/m/y" />
    </div>
</div>
<script>
jQuery(document).ready(function(){
    jQuery(":input").inputmask();
});
</script>