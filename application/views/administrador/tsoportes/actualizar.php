<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
<form>
<?php foreach ($tipoSoporte as $ts): ?>
  <div class="ui warning form segment">
    <div class="field">
        <label>ID</label>
        <input class="text" id="idTipoSoporte" value="<?php echo $ts->idSoporte ?>" disabled>
    </div>
    <div class="field required">
        <label>Nombre tipo soporte</label>
        <input class="requerido" type="text" data-tipo="texto" data-minimo="5" data-maximo="30" 
        id="nombreTipoSoporte" value="<?php echo $ts->nombreSoporte ?>"> 
    </div>
    <div  id="mensajeTipoSoporte"></div><br>
    <div  id="actualizarTipoSoporte" class="button ui green">Actualizar</div>
      <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
        <div class="button ui red">Cancelar</div>
      </a>
  </div>
</form>
<?php endforeach ?>
<?php if (!$tipoSoporte): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron tipos de soportes por el parametro de busqueda</td>
  </tr>
<?php endif ?>