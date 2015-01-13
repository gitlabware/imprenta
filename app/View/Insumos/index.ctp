<div class="row">
    <div class="col-md-12">
        <h2>Listado de Insumos</h2>
        <br>
        <table class="table table-bordered dataTable" id="tablainsumos">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($insumos as $in):?>
                <tr>
                    <td><?php echo $in['Insumo']['id']?></td>
                    <td><?php echo $in['Insumo']['nombre']?></td>
                    <td><?php echo $in['Insumo']['descripcion']?></td>
                    <td><?php echo $in['Insumo']['tipo']?></td>
                    <td><?php echo $in['Insumo']['precio']?></td>
                    <td><?php echo $in['Insumo']['cantidad']?></td>
                    <td><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action'=>'insumo', $in['Insumo']['id']));?>');" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Editar</a>
                        <?php ?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
