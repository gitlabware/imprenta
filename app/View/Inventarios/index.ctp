<div class="row">
    <div class="col-md-12">
        <h2>Inventario</h2>
        <br>
        <table class="table table-bordered datatable" id="tablainventarios">
            <thead>
                <tr>
                    <th>Insumo</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventarios as $in): ?>
                    <tr>
                        <td><?php echo $in['Insumo']['nombre']; ?></td>
                        <td><?php echo $in['Insumo']['descripcion']; ?></td>
                        <td><?php echo $in['Inventario']['cantidad_total']; ?></td>
                        <td>
                            <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'movimiento', $in['Insumo']['id'], 1)) ?>');">Ingresar</a>
                            <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'movimiento', $in['Insumo']['id'], 2)) ?>');">Sacar</a>
                            <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'movimientos', $in['Insumo']['id'])) ?>');">Detalle</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="javascript:" class="btn btn-primary" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'movimiento', 0, 1)) ?>');">
            <i class="entypo-plus"></i>
            Add Inventario
        </a>
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
        tableContainer = $("#tablainventarios");

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