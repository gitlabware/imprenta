<div class="row">
    <div class="col-md-12">
        <h2>Listado de Facturas</h2>
        <br>
        <table class="table table-bordered datatable" id="tabladocificaciones">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Codigo Control</th>
                    <th>Nit</th>
                    <th>Importe Total</th>
                    <th>Numero</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facturas as $fa): ?>
                    <tr>
                        <td><?php echo $fa['Factura']['fecha']; ?></td>
                        <td><?php echo $fa['Factura']['codigo_control']; ?></td>
                        <td><?php echo $fa['Factura']['nit']; ?></td>
                        <td><?php echo $fa['Factura']['importetotal']; ?></td>
                        <td><?php echo $fa['Factura']['numero']; ?></td>
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