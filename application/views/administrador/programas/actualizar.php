<div class="grid ui">
  <div class="row">
    <div class="column two wide"></div>
    <div class="column twelve wide">
<form>
<?php foreach ($programa as $pro): ?>
  <div class="ui warning form segment">
    <div class="field">
        <label>ID</label>
        <input class="text" id="idTipoPrograma" value="<?php echo $pro->idTipoPrograma ?>" disabled>
    </div>
    <div class="field required">
        <label>Nombre Programa</label>
        <input class="requerido" type="text" data-tipo="texto" data-minimo="5" data-maximo="30" 
        id="nombreTipoPrograma" value="<?php echo $pro->nombreTipoPrograma ?>"> 
    </div>
    <div  id="mensajePrograma"></div><br>
    <div  id="actualizarPrograma" class="button ui green">Actualizar</div>
      <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
        <div class="button ui red">Cancelar</div>
      </a>
  </div>
</form>
<?php endforeach ?>
<?php if (!$programa): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron areas por el parametro de busqueda</td>
  </tr>
<?php endif ?>