<h3>Listado de Trabajos</h3>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered datatable" id="tablatrabajos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripcion</th>
                    <th>Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trabajos as $tra):?>
                <?php 
                $clase = '';
                if($tra['Trabajo']['estado'] == 1)
                {
                    $clase = 'success';
                }
                ?>
                <tr>
                    <td class="<?php echo $clase;?>"><?php echo $tra['Trabajo']['id'];?></td>
                    <td class="<?php echo $clase;?>"><?php echo $tra['Trabajo']['descripcion'];?></td>
                    <td class="<?php echo $clase;?>"><?php echo $tra['Cliente']['nombre'];?></td>
                    <td class="<?php echo $clase;?>">
                        <a href="<?php echo $this->Html->url(array('action' => 'vista_trabajo',$tra['Trabajo']['id']));?>" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-eye"></i>Ver Trabajo</a>
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
        tableContainer = $("#tablatrabajos");

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