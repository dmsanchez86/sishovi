<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
   <form>
<div class="ui warning form segment" id="formularioAreas">
    <div class="field required">
      <label>Nombre Area</label>
      <input class="requerido" placeholder="Nombre" type="text" data-tipo="texto" data-minimo="5" data-maximo="30"  id="nombreArea">
    </div>
  </form>
  <div  id="mensajeArea"></div><br>
  	<div  id="guardarArea" class="button ui green">Guardar</div>
    <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
	 <div class="button ui red">Cancelar</div>
   </a>
</div>
