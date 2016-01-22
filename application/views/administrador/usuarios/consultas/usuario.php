<thead>
    <tr>

      <th colspan="8">
        <a href="<?php echo base_url() ?>index.php/reportesC/usuarios/<?php if(!$usuBusqueda) echo "0" ; else echo $usuBusqueda; ?>/<?php if(!$tipo) echo "0" ; else echo $tipo;?>" data-content="exportar a pdf"  class="ui mini icon button purple pop">
          Generar reporte
          <i class="file pdf outline icon white"></i>
        </a>
      </th>
    </tr>
    <tr>
    <!-- idUsuario, nombreUsuario, areaId, documentoUsuario, password, rolId, estadoId, cargoId -->
      <th>id</th>
      <th>Nombre</th>
      <th>Documento</th>
      <th>Area</th>
      <th>Estado</th>
      <th>Cargo</th>
      <th>Rol</th>
      <?php if (($this->session->userdata('rol')==1)): ?>
          <th>Accion</th>
      <?php endif ?>

    </tr>
  </thead>
  <tbody>

<?php foreach ($usuario as $u): ?>
  <tr data-usuario="<?php echo $u->idUsuario; ?>" class="">
      <td><?php echo $u->idUsuario ?></td>
      <td><?php echo $u->nombreUsuario ?></td>
      <td><?php echo $u->documentoUsuario ?></td>
      <td><?php echo $u->nombreArea ?></td>
      <td class="center aligned">
      <?php if (($this->session->userdata('rol')==1)): ?>
        <div class="ui toggle checkbox estadoUsuario" >
          <input type="checkbox" name="public" <?php if($u->estadoId == 1) echo "checked" ?>>
      <?php endif ?>
        </div>
      </td>
      <td><?php echo $u->nombreCargo ?></td>
      <td class="center aligned"><a class="ui teal label"><i class="user icon"></i><?php echo $u->nombreRol ?></a></td>
       <?php if (($this->session->userdata('rol')==1)): ?>
      <td>
        <a data-content="Actualizar/Editar" href="<?php echo base_url(); ?>index.php/usuarioC/menu/actualizar/<?php echo $u->documentoUsuario; ?>" target="<?php echo $u->idUsuario ?>"  class="ui mini icon button blue pop">
          <i class="edit icon"></i>
        </a>
          <a data-content="Reestablecer contraseña"  class="ui mini icon button orange pop btnRestablecerClave">
            <i class="key icon"></i>
          </a>
        <?php endif ?>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$usuario): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron usuarios por el parametro de busqueda</td>
  </tr>
<?php endif ?>
  </tbody>
<script>
  $(".checkbox").checkbox();
$(".pop").popup();
</script>

