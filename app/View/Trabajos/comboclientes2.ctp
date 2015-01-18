<?php if(!empty($listaclientes)):?>
<table class="table table-condensed table-bordered table-hover table-striped">
    <thead>
    <tr>
    <th>NIT/CI</th>
    <th>Nombre</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($listaclientes as $ma):?>
        <tr style="cursor: pointer;" onclick="jQuery('#<?php echo $div;?>').load('<?php echo $this->Html->url(array('action' => 'comboclientes3',$campoform,$div,$ma['Cliente']['id']));?>');jQuery('#modalimprentados').modal('toggle');" >
        <td><?php echo $ma['Cliente']['nit'];?></td>
        <td><?php echo $ma['Cliente']['nombre'];?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php else:?>
<h4 style="color: blue;">No hay registros!!!</h4>
<?php endif;?>
