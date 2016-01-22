<thead>
    <tr>

      <th colspan="8">
        <a href="<?php echo base_url() ?>index.php/reportesC/programas/<?php if(!$programaBusqueda) echo "0" ; else echo $programaBusqueda; ?>/<?php if(!$tipo) echo "0" ; else echo $tipo;?>" data-content="exportar a pdf"  class="ui mini icon button purple pop">
          Generar reporte
          <i class="file pdf outline icon white"></i>
        </a>
      </th>
    </tr>
    <tr>

<thead>
    <tr>
      <th>id</th>
      <th>Nombre del programa</th>
      <th>Estado</th>
      <th>Accion</th>
    </tr>
  </thead>

<?php foreach ($programa as $pro): ?>
  <tr data-programa="<?php echo $pro->idTipoPrograma; ?>" class="">
      <td><?php echo $pro->idTipoPrograma ?></td>
      <td><?php echo $pro->nombreTipoPrograma ?></td>
      <td class="center aligned">
        <div class="ui toggle checkbox  estadoPrograma" >
          <input type="checkbox" name="public" <?php if($pro->estadoId == 1) echo "checked" ?>>
        </div>
      </td>
      <td>
        <a data-content="Editar/Actualizar" href="<?php echo base_url(); ?>index.php/programaC/menu/actualizar/<?php echo $pro->idTipoPrograma; ?>" target="<?php echo $pro->idTipoPrograma; ?>"  class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$programa): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron programas por el parametro de busqueda</td>
  </tr>
<?php endif ?>
<script>
  $(".checkbox").checkbox();
   $(".pop").popup();
</script>