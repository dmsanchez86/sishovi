<thead>
    <tr>

      <th colspan="8">
        <a href="<?php echo base_url() ?>index.php/reportesC/profesiones/<?php if(!$profesionBusqueda) echo "0" ; else echo utf8_encode(trim($profesionBusqueda)); ?>/<?php if(!$tipo) echo "0" ; else echo $tipo;?>" data-content="exportar a pdf"  class="ui mini icon button purple pop">
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

<?php foreach ($profesion as $p): ?>
  <tr data-profesion="<?php echo $p->idProfesion; ?>" class="">
      <td><?php echo $p->idProfesion ?></td>
      <td><?php echo $p->nombreProfesion ?></td>
      <td class="center aligned">
        <div class="ui toggle checkbox  estadoProfesion" >
          <input type="checkbox" name="public" <?php if($p->estadoId == 1) echo "checked" ?>>
        </div>
      </td>
      <td>
        <a data-content="Editar/Actualizar" href="<?php echo base_url(); ?>index.php/profesionC/menu/actualizar/<?php echo $p->idProfesion; ?>" target="<?php echo $p->idProfesion; ?>" class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$profesion): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron profesiones por el parametro de busqueda</td>
  </tr>
<?php endif ?>
<script>
  $(".checkbox").checkbox();
   $(".pop").popup();
</script>