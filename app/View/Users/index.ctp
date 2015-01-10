<div class="row">
    <div class="col-md-12">
        <h2>Listado de Usuarios</h2>
        <br>
        <table class="table table-bordered datatable" id="tablausuarios">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Username</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $us):?>
                <tr>
                    <td><?php echo $us['User']['id'];?></td>
                    <td><?php echo $us['User']['nombre'];?></td>
                    <td><?php echo $us['User']['username'];?></td>
                    <td><?php echo $us['User']['role'];?></td>
                    <td><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action'=>'usuario'))?>');">Editar</a></td>
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
		    phone : 480
		};
		var tableContainer;
		
			jQuery(document).ready(function($)
			{
				tableContainer = $("#tablausuarios");
				
				tableContainer.dataTable({
					"sPaginationType": "bootstrap",
					"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"bStateSave": true,
					
		
				    // Responsive Settings
				    bAutoWidth     : false,
				    fnPreDrawCallback: function () {
				        // Initialize the responsive datatables helper once.
				        if (!responsiveHelper) {
				            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
				        }
				    },
				    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
				        responsiveHelper.createExpandIcon(nRow);
				    },
				    fnDrawCallback : function (oSettings) {
				        responsiveHelper.respond();
				    }
				});
				
				$(".dataTables_wrapper select").select2({
					minimumResultsForSearch: -1
				});
			});
		</script>