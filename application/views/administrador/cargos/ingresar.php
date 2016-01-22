<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
    <form>
<div class="ui warning form segment" id="formularioCargo">
    <div class="field required">
      <label>Nombre Cargo</label>
      <input class="requerido"  data-tipo="texto" data-minimo="3" data-maximo="30" placeholder="Nombre" type="text" id="nombreCargo">
    </div>
    </form>
    <div  id="mensajeCargo"></div><br>
    <div id="guardarCargo" class="button ui green">Guardar</div>
  <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
    <div class="button ui red">Cancelar</div>
  </a>
</div>