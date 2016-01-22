<thead>
    <tr>

      <th colspan="8">
        <a href="<?php echo base_url() ?>index.php/reportesC/tipoVinculaciones/<?php if(!$tvinculacionBusqueda) echo "0" ; else echo $tvinculacionBusqueda; ?>/<?php if(!$tipo) echo "0" ; else echo $tipo;?>" data-content="exportar a pdf"  class="ui mini icon button purple pop">
          Generar reporte
          <i class="file pdf outline icon white"></i>
        </a>
      </th>
    </tr>
    <tr>

<thead>
    <tr>
      <th>id</th>
      <th>Nombre</th>
      <th>Estado</th>
      <th>Accion</th>
    </tr>
  </thead>

<?php foreach ($tipoVinculacion as $vin): ?>
  <tr data-tipovinculacion="<?php echo $vin->idTipoVinculacion; ?>" class="">
      <td><?php echo $vin->idTipoVinculacion ?></td>
      <td><?php echo $vin->nombreTipoVinculacion ?></td>
      <td class="center aligned">
        <div class="ui toggle checkbox  estadoTipoVinculacion" >
          <input type="checkbox" name="public" <?php if($vin->estadoId == 1) echo "checked" ?>>
        </div>
      </td>
      <td>
        <a data-content="Editar/Actualizar" href="<?php echo base_url(); ?>index.php/tipovinculacionC/menu/actualizar/<?php echo $vin->idTipoVinculacion; ?>" target="<?php echo $vin->idTipoVinculacion; ?>" class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$tipoVinculacion): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron tipos de vinculaciones por el parametro de busqueda</td>
  </tr>
<?php endif ?>
<script>
  $(".checkbox").checkbox();
   $(".pop").popup();
</script>