<thead>
    <tr>

      <th colspan="8">
        <a href="<?php echo base_url() ?>index.php/reportesC/hojasdevida/<?php if(!$hojaBusqueda) echo "0" ; else echo $hojaBusqueda; ?>/<?php if(!$tipo) echo "0" ; else echo $tipo;?>" data-content="exportar a pdf"  class="ui mini icon button purple pop">
          Generar reporte
          <i class="file pdf outline icon white"></i>
        </a>
      </th>
    </tr>
    <tr>
    <!-- idUsuario, nombreUsuario, areaId, documentoUsuario, password, rolId, estadoId, cargoId -->
      <th>Documento</th>
      <th>Nombre completo</th>
      <th>Fecha en que ingreso<a href="#">&nbsp;&nbsp;aa-mm-dd</a></th>
      <th>Cargo al que aspira</th>
      <th colspan="2">Accion</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($hojadevida as $hv): ?>
  <tr data-hojadevida="<?php echo $hv->documento; ?>" class="">
      <td><?php echo $hv->documento ?></td>
      <td><?php echo $hv->nombreCompleto." ".$hv->primerApellido." ".$hv->segundoApellido?></td>
      <td class="ui center aligned"><?php echo $hv->fechaIngreso ?></td>
      <td><?php echo $hv->nombreCargo ?></td>
      <?php if (($this->session->userdata('rol')==1)): ?> 
        <?php if ($hv->vinculado==1): ?>
            <td>
                <a href="<?php echo base_url(); ?>index.php/vinculacionC/menu/agregar/<?php echo $hv->documento; ?>" target="<?php echo $hv->documento; ?>"  data-content="Desvincular" class="ui button mini red pop">Desvincular</a>
            </td>
          <?php else: ?>
            <td>
                <a data-content="Vincular" href="<?php echo base_url(); ?>index.php/vinculacionC/menu/agregar/<?php echo $hv->documento; ?>" target="<?php echo $hv->documento; ?>" class="ui button mini green pop">Vincular</a>
            </td>
        <?php endif ?>
      <?php endif ?>
      <td>
        <a  data-content="Editar/Actualizar"  href="<?php echo base_url(); ?>index.php/hojadevidaC/menu/actualizar/<?php echo $hv->documento; ?>" target="<?php echo $hv->documento; ?>" class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
        <a  data-content="Ver informacion completa" target="detalle_<?php echo $hv->documento ?>" href="<?php echo base_url() ?>index.php/hojadevidaC/detalle/<?php echo $hv->documento ?> " class="ui mini green icon button pop">
          <i class="unhidden eye icon "></i>
        </a>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$hojadevida): ?>
	<tr class="positive">
		<td colspan="8" >No se encontraron hojas de vida por el parametro de busqueda</td>
	</tr>
<?php endif ?>
<script>
  $('.pop').popup();
</script>
