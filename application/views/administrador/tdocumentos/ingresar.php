<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
    <form>
<div class="ui warning form segment" id="formularioTipoDoc">
    <div class="field required">
      <label>Nombre del documento</label>
      <input class="requerido" placeholder="Nombre" type="text" id="nombreTipoDocumento">
    </div>
  </form>
  	<div  id="mensajeTipoDocumento"></div><br>
    <div id="guardarTipoDocumento" class="button ui green">Guardar</div>
    <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
      <div class="button ui red">Cancelar</div>
    </a>
</div>