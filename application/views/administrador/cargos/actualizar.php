<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
<form>
<?php foreach ($cargo as $c): ?>
  <div class="ui warning form segment">
   <div class="field required">
      <div class="field">
        <label>ID</label>
        <input class="text" id="idCargo" value="<?php echo $c->idcargos ?>" disabled>
    </div>
      <label>Nombre Cargo</label>
      <input class="requerido" data-tipo="texto" data-minimo="3" data-maximo="16" value="<?php echo $c->nombreCargo ?>" type="text" id="nombreCargo">
    </div>
    <div  id="mensajeCargo"></div><br>
    <div  id="actualizarCargo" class="button ui green">Actualizar</div>
      <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
        <div class="button ui red">Cancelar</div>
      </a>
  </div>
</form>
<?php endforeach ?>
<?php if (!$cargo): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron cargos por el parametro de busqueda</td>
  </tr>
<?php endif ?>
