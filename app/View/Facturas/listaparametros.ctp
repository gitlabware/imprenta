<div class="row">
    <div class="col-md-12">
        <h2>Listado de Docificaciones</h2>
        <br>
        <table class="table table-bordered datatable" id="tabladocificaciones">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Numero Autorizacion</th>
                    <th>Fecha Limite</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parametros as $pa): ?>
                    <tr>
                        <td><?php echo $pa['Parametrosfactura']['id']; ?></td>
                        <td><?php echo $pa['Parametrosfactura']['numero_autorizacion']; ?></td>
                        <td><?php echo $pa['Parametrosfactura']['fechalimite']; ?></td>
                        <td>
                            <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'parametrofactura', $pa['Parametrosfactura']['id'])) ?>');" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Editar</a>
                            <?php echo $this->Html->link('<i class="entypo-cancel"></i>Eliminar',array('action'=>'elimina_parametro', $pa['Parametrosfactura']['id']),array('class'=>'btn btn-danger btn-sm btn-icon icon-left','escape'=>false,'confirm'=>'Esta seguro de eliminar la docificacion '.$pa['Parametrosfactura']['numero_autorizacion']));?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    --></div>
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
        tableContainer = $("#tabladocificaciones");

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