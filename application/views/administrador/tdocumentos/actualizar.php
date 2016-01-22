<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
<form>
<?php foreach ($tipoDoc as $td): ?>
  <div class="ui warning form segment">
    <div class="field">
        <label>ID</label>
        <input class="text" id="idTipoDocumento" value="<?php echo $td->idTipoDocumento ?>" disabled>
    </div>
    <div class="field required">
        <label>Nombre tipo documento</label>
        <input class="requerido" type="text" data-tipo="texto" data-minimo="5" data-maximo="30" 
        id="nombreTipoDocumento" value="<?php echo $td->nombreTipoDocumento ?>"> 
    </div>
    <div  id="mensajeTipoDocumento"></div><br>
    <div  id="actualizarTipoDocumento" class="button ui green">Actualizar</div>
      <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
        <div class="button ui red">Cancelar</div>
      </a>
  </div>
</form>
<?php endforeach ?>
<?php if (!$tipoDoc): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron tipos de documentos por el parametro de busqueda</td>
  </tr>
<?php endif ?>