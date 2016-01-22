<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
    <form>
<div class="ui warning form segment" id="formularioSoporte">
    <div class="field required">
      <label>Nombre del Tipo de Soporte</label>
      <input class="requerido" data-tipo="texto" data-minimo="5" data-maximo="30" placeholder="Nombre" type="text" id="nombreSoporte">
    </div>
  </form>
   	<div  id="mensajeTipoSoporte"></div><br>
  	<div id="guardarTipoSoporte" class="button ui green">Guardar</div>
  	<a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
      <div class="button ui red">Cancelar</div>
    </a>
</div>