<thead>
    <tr>

      <th colspan="8">
        <a href="<?php echo base_url() ?>index.php/reportesC/vinculaciones/<?php if(!$vinculacionBusqueda) echo "0" ; else echo $vinculacionBusqueda; ?>/<?php if(!$tipo) echo "0" ; else echo $tipo;?>" data-content="exportar a pdf"  class="ui mini icon button purple pop">
          Generar reporte
          <i class="file pdf outline icon white"></i>
        </a>
      </th>
    </tr>
    <tr>

<thead>
      <th>id</th>
      <th>Documento</th>
      <th>Nombre</th>
      <th>Cargo</th>
      <th>Estado</th>
      <th>Tipo de vinculacion</th>
      <th>Fecha de desvinculación</th>
      <th>Accion</th>
    </tr>
  </thead>

<?php foreach ($vinculacion as $v): ?>
	<tr data-vinculacion="<?php echo $v->idDatoVinculacion; ?>" class="">
      <td><?php echo $v->idDatoVinculacion ?></td>
      <td><?php echo $v->documento ?></td>
      <td><?php echo $v->nombreCompleto ?> <?php echo $v->primerApellido ?> <?php echo $v->segundoApellido ?></td>
      <td><?php echo $v->nombreCargo ?></td>
      <td class="center aligned">
        <div class="ui toggle checkbox  disabled" >
          <input type="checkbox" name="public" <?php if($v->estadoId == 1) echo "checked" ?>>
        </div>
      </td>
      <td><?php echo $v->nombreTipoVinculacion ?></td>
      <?php if ($v->fechaDesvinculacion): ?>
          <td><i class="remove circle red icon"></i><?php echo $v->fechaDesvinculacion ?></td>
        <?php else: ?>
          <td><i class="check circle green icon"></i><?php echo "No se ha desvinculado" ?></td>
      <?php endif ?>
      <?php if ($v->estadoId==2): ?>
        <td>
          <a data-content="Editar/Actualizar" href="<?php echo base_url(); ?>index.php/vinculacionC/menu/actualizar/<?php echo $v->documento; ?>" target="<?php echo $v->documento; ?>" class="ui disabled mini icon button blue pop">
            <i class="edit icon"></i>
          </a>
          <a  data-content="Ver informacion completa" target="detalle_<?php echo $v->documento ?>" href="<?php echo base_url() ?>index.php/vinculacionC/detalle/<?php echo $v->idDatoVinculacion ?> " class="ui mini green icon button pop">
            <i class="unhidden eye icon "></i>
          </a>
        </td>
      <?php else: ?>
      <td>
        <a data-content="Editar/Actualizar" href="<?php echo base_url(); ?>index.php/vinculacionC/menu/actualizar/<?php echo $v->documento; ?>" target="<?php echo $v->documento; ?>" class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
        <a  data-content="Ver informacion completa" target="detalle_<?php echo $v->documento ?>" href="<?php echo base_url() ?>index.php/vinculacionC/detalle/<?php echo $v->idDatoVinculacion ?> " class="ui mini green icon button pop">
          <i class="unhidden eye icon "></i>
        </a>
      </td>
    </tr>
    <?php endif ?>
<?php endforeach ?>
<?php if (!$vinculacion): ?>
	<tr class="positive">
		<td colspan="12" >No se encontraron vinculaciones por el parametro de busqueda</td>
	</tr>
<?php endif ?>
<script>
  $(".checkbox").checkbox();
   $('.pop').popup();
</script>
