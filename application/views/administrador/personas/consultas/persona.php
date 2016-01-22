<?php foreach ($persona as $p): ?>
  <tr class="">
      <td><?php echo $p->nombreTipoDocumento ?></td>
      <td><?php echo $p->documento ?></td>
      <td><?php echo $p->nombreCompleto ?></td>
      <td><?php echo $p->primerApellido ?></td>
      <td><?php echo $p->segundoApellido ?></td>
      <td><?php echo $p->tipoSangre ?></td>
      <td><?php echo $p->tipoGenero ?></td>
      <td>
        <?php if (($this->session->userdata('rol')==1)): ?>
          <div class="ui mini icon button blue">
            <i class="edit icon"></i>
          </div>
          
        <?php endif ?>
      </td>
    </tr>
<?php endforeach ?>
<?php if (!$persona): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron personas por el parametro de busqueda</td>
  </tr>
<?php endif ?>