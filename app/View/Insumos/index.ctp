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

<script type="text/javascript">
    var responsiveHelper;
    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };
    var tableContainer;

    jQuery(document).ready(function ($)
    {
        tableContainer = $("#tablausuarios");

        tableContainer.dataTable({
            "sPaginationType": "bootstrap",
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "bStateSave": true,
            // Responsive Settings
            bAutoWidth: false,
            fnPreDrawCallback: function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper) {
                    responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
                }
            },
            fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                responsiveHelper.createExpandIcon(nRow);
            },
            fnDrawCallback: function (oSettings) {
                responsiveHelper.respond();
            }
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>
