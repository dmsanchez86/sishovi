<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
    <form>
<div class="ui warning form segment" id="formularioTipoVinculacion">
    <div class="field required">
      <label>Nombre del tipo de vinculacion</label>
      <input class="requerido" placeholder="Tipo de vinculacion" data-tipo="texto" data-minimo="5" data-maximo="20" type="text" id="nombreTipoVinculacion">
    </div>
  </form>
  	<div  id="mensajeTipoVinculacion"></div><br>
    <div id="guardarTipoVinculacion" class="button ui green">Guardar</div>
    <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
      <div class="button ui red">Cancelar</div>
    </a>
</div>