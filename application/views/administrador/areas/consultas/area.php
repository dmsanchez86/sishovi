<thead>
    <tr>

      <th colspan="8">
        <a href="<?php echo base_url() ?>index.php/reportesC/areas/<?php if(!$areaBusqueda) echo "0" ; else echo utf8_encode(trim($areaBusqueda)); ?>/<?php if(!$tipo) echo "0" ; else echo $tipo;?>" data-content="exportar a pdf"  class="ui mini icon button purple pop">
          Generar reporte
          <i class="file pdf outline icon white"></i>
        </a>
      </th>
    </tr>
    <tr>

<thead>
    <tr>
      <th>id</th>
      <th>Nombre area</th>
      <th>Estado</th>
      <th>Accion</th>
    </tr>
  </thead>
  <tbody>

<?php foreach ($area as $a): ?>
  <tr data-area="<?php echo $a->idArea; ?>" class="">
      <td><?php echo $a->idArea ?></td>
      <td><?php echo $a->nombreArea ?></td>
      <td class="center aligned">
        <div class="ui toggle checkbox  estadoArea" >
          <input type="checkbox" name="public" <?php if($a->estadoId == 1) echo "checked" ?>>
        </div>
      </td>
      <td>
        <a data-content="Actualizar/Editar"  href="<?php echo base_url(); ?>index.php/areaC/menu/actualizar/<?php echo $a->idArea; ?>" target="<?php echo $a->idArea; ?>" class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$area): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron areas por el parametro de busqueda</td>
  </tr>
<?php endif ?>
<script>
  $(".checkbox").checkbox();
$(".pop").popup();
</script>
