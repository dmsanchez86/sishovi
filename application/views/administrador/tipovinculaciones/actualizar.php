<div class="grid ui">
  <div class="row">
    <div class="column two wide"></div>
    <div class="column twelve wide">
<?php foreach ($tipoVinculacion as $tv): ?>
  <div class="ui warning form segment">
    <div class="field">
        <label>ID</label>
        <input class="text" id="idTipoVinculacion" value="<?php echo $tv->idTipoVinculacion ?>" disabled>
    </div>
    <div class="field required">
        <label>Nombre tipo vinculcion</label>
        <input class="requerido" type="text" data-tipo="texto" data-minimo="5" data-maximo="30" 
        id="nombreTipoVinculacion" value="<?php echo $tv->nombreTipoVinculacion ?>"> 
    </div>
    <div  id="mensajeVinculacion"></div><br>
    <div  id="actualizarTipoVinculacion" class="button ui green">Actualizar</div>
      <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
        <div class="button ui red">Cancelar</div>
      </a>
  </div>
<?php endforeach ?>
<?php if (!$tipoVinculacion): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron tipos de vinculaciones por el parametro de busqueda</td>
  </tr>
<?php endif ?>