<thead>
    <tr>

      <th colspan="8">
        <a href="<?php echo base_url() ?>index.php/reportesC/cargos/<?php if(!$cargoBusqueda) echo "0" ; else echo utf8_encode(trim($cargoBusqueda)); ?>/<?php if(!$tipo) echo "0" ; else echo $tipo;?>" data-content="exportar a pdf"  class="ui mini icon button purple pop">
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

<?php foreach ($cargo as $c): ?>
	<tr data-cargo="<?php echo $c->idcargos; ?>" class="">
      <td><?php echo $c->idcargos ?></td>
      <td><?php echo $c->nombreCargo ?></td>
      <td class="center aligned">
        <div class="ui toggle checkbox  estadoCargo" >
          <input type="checkbox" name="public" <?php if($c->estadoId == 1) echo "checked" ?>>
        </div>
      </td>
      <td>
        <a data-content="Editar/Actualizar" href="<?php echo base_url(); ?>index.php/cargoC/menu/actualizar/<?php echo $c->idcargos; ?>" target="<?php echo $c->idcargos; ?>" class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$cargo): ?>
	<tr class="positive">
		<td colspan="8" >No se encontraron cargos por el parametro de busqueda</td>
	</tr>
<?php endif ?>
<script>
  $(".checkbox").checkbox();
  $(".pop").popup();
</script>