<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
    <form>
<div class="ui warning form segment" id="formularioEmpresa">
  <h5 class="ui header red center aligned">(*) Los campos con este signo, son obligatorios!</h5>
    <div class="two fields">
      <div class="field required">
        <label>Nombre Empresa</label>
        <input class="requerido" data-tipo="texto" data-minimo="3" data-maximo="16" placeholder="Nombre" type="text" id="nombreEmpresa">
      </div>
      <div class="field">
        <label>Nit</label>
        <input placeholder="NIT" type="text" id="nit">
      </div>
    </div>
    <div class="field">
        <label>Direccion</label>
        <input placeholder="Direccion" type="text" id="direccion">
    </div>
  </form>
  <div  id="mensajeEmpresa"></div><br>
  <div id="guardarEmpresa" class="button ui green">Guardar</div>
  <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
    <div class="button ui red">Cancelar</div>
  </a>
</div>