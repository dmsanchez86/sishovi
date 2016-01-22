<thead>
    <tr>

      <th colspan="8">
        <a href="<?php echo base_url() ?>index.php/reportesC/tipoSoporte/<?php if(!$tsoporteBusqueda) echo "0" ; else echo $tsoporteBusqueda; ?>/<?php if(!$tipo) echo "0" ; else echo $tipo;?>" data-content="exportar a pdf"  class="ui mini icon button purple pop">
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
<?php foreach ($tsoporte as $ts): ?>
	<tr  data-tsoporte="<?php echo $ts->idSoporte; ?>" class="">
      <td><?php echo $ts->idSoporte ?></td>
      <td><?php echo $ts->nombreSoporte ?></td>
      <td class="center aligned">
        <div class="ui toggle checkbox  estadoTipoSoporte" >
          <input type="checkbox" name="public" <?php if($ts->estadoId == 1) echo "checked" ?>>
        </div>
      </td>
      <td>
        <a data-content="Actualizar/Editar"  href="<?php echo base_url(); ?>index.php/tipoSopC/menu/actualizar/<?php echo $ts->idSoporte; ?>" target="<?php echo $ts->idSoporte; ?>" class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$tsoporte): ?>
	<tr class="positive">
		<td colspan="8" >No se encontraron tipo de soportes por el parametro de busqueda</td>
	</tr>
<?php endif ?>
<script>
  $(".checkbox").checkbox();
  $(".pop").popup();
</script>