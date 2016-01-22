<thead>
    <tr>

      <th colspan="8">
        <a href="<?php echo base_url() ?>index.php/reportesC/empresas/<?php if(!$empresaBusqueda) echo "0" ; else echo utf8_encode(trim($empresaBusqueda)); ?>/<?php if(!$tipo) echo "0" ; else echo $tipo;?>" data-content="exportar a pdf"  class="ui mini icon button purple pop">
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
      <th>Dirección</th>
      <th>Nit</th>
      <th>Estado</th>
      <th>Acción</th>
    </tr>
  </thead>
<tbody>
<?php foreach ($empresa as $e): ?>
	<tr data-empresa="<?php echo $e->idEmpresa; ?>" class="">
      <td><?php echo $e->idEmpresa ?></td>
      <td><?php echo $e->nombreEmpresa ?></td>
      <td><?php echo $e->direccionEmpresa ?></td>
      <td><?php echo $e->nit ?></td>
      <td class="center aligned">
        <div class="ui toggle checkbox  estadoEmpresa" >
          <input type="checkbox" name="public" <?php if($e->estadoId == 1) echo "checked" ?>>
        </div>
      </td>
      <td>
        <a href="<?php echo base_url(); ?>index.php/empresaC/menu/actualizar/<?php echo $e->idEmpresa; ?>" target="<?php echo $e->idEmpresa; ?>" data-content="Editar/Actualizar" class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$empresa): ?>
	<tr class="positive">
		<td colspan="8" >No se encontraron empresas por el parametro de busqueda</td>
	</tr>
<?php endif ?>
<script>
  $(".checkbox").checkbox();
  $(".pop").popup();
</script>