
 <thead>
    <tr>
      <th>id</th>
      <th>Nombre</th>
      <th>Accion</th>
    </tr>
  </thead>
<?php foreach ($tdocumento as $td): ?>
  <tr data-tipoDocumento="<?php echo $td->idTipoDocumento; ?>" class="">
      <td><?php echo $td->idTipoDocumento ?></td>
      <td><?php echo $td->nombreTipoDocumento ?></td>
      <td>
        <a data-content="Actualizar/Editar"  href="<?php echo base_url(); ?>index.php/tipodocC/menu/actualizar/<?php echo $td->idTipoDocumento; ?>" target="<?php echo $td->idTipoDocumento; ?>" class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$tdocumento): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron tipos de documento por el parametro de busqueda</td>
  </tr>
<?php endif ?>
<script>
  $(".pop").popup();
</script>