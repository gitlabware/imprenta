<div class="row">
  <div class="col-md-12">
    <h2>Listado de Costos</h2>
    <br>
    <table class="table table-bordered datatable" id="tablainsumos">
      <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Precio de Compra</th>
        <th>Rendimiento</th>
        <th>20% oficio 216*330</th>
        <th>100% oficio </th>
        <th>Acciones</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($costos as $c): ?>
        <tr>
          <td><?php echo $c['Costo']['id']; ?></td>
          <td><?php echo $c['Costo']['nombre']; ?></td>
          <td><?php echo $c['Costo']['preciocompra']; ?></td>
          <td><?php echo $c['Costo']['rendimiento']; ?></td>
          <td><?php echo $c['Costo']['costouno']?></td>
          <td><?php echo $c['Costo']['costodos']?></td>
          <td><a href="javascript:"
                 onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'edit', $c['Costo']['id'])) ?>');"
                 class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Editar</a>
            <?php echo $this->Html->link('<i class="entypo-cancel"></i>Eliminar', array('action' => 'delete', $c['Costo']['id']), array('class' => 'btn btn-danger btn-sm btn-icon icon-left', 'escape' => false, 'confirm' => 'Esta seguro de eliminar el costo ' . $c['Costo']['id'])); ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <!--  <a href="javascript:" onclick="cargarmodal('<?php //echo $this->Html->url(array('action'=>'usuario'))?>');" class="btn btn-primary"><i class="entypo-plus"></i>Nuevo Usuario</a>
    --></div>
</div>

<script type="text/javascript">
  var responsiveHelper;
  var breakpointDefinition = {
    tablet: 1024,
    phone: 480
  };
  var tableContainer;

  jQuery(document).ready(function ($) {
    tableContainer = $("#tablainsumos");

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