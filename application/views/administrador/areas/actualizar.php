<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
    <form>
<?php foreach ($area as $a): ?>
  <div class="ui warning form segment">
    <div class="field required">
        <label>Nombre Area</label>
        <input data-valor="<?php echo $a->idArea ?>" class="requerido" type="text" data-tipo="texto" data-minimo="5" data-maximo="30" 
        id="nombreArea" value="<?php echo $a->nombreArea ?>"> 
    </div>
    <div  id="mensajeArea"></div><br>
    <div  id="actualizarArea" class="button ui green">Actualizar</div>
      <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
        <div class="button ui red">Cancelar</div>
      </a>
  </div>
</form>
<?php endforeach ?>
<?php if (!$area): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron areas por el parametro de busqueda</td>
  </tr>
<?php endif ?>
    <div class="column two wide"></div>
  </div>
</div>