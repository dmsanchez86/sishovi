<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
    <form>
<div class="ui warning form segment" id="formularioPrograma">
    <div class="field required">
      <label>Nombre del tipo de programa</label>
      <input class="requerido" placeholder="Nombre" data-tipo="texto" data-minimo="5" data-maximo="35" type="text" id="nombreTipoPrograma">
    </div>
  </form>
  	<div  id="mensajePrograma"></div><br>
    <div id="guardarPrograma" class="button ui green">Guardar</div>
    <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
      <div class="button ui red">Cancelar</div>
    </a>
</div>