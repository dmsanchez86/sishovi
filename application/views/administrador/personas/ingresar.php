<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
    <form>
<div class="ui warning form segment">
  <div class="two fields">
  <div class="field">
      <label >Seleccione el tipo de documento</label>
      <div id="tipoDocumento" class="ui selection dropdown">
        <input class="requerido" type="hidden" name="gender">
            <div class="default text">Tipo de documento</div>
            <i class="dropdown icon"></i>
        <div class="menu">
            <?php foreach ($tipoDocumento as $td): ?>
              <div class="item" data-value="<?php echo $td->idTipoDocumento ?>"><?php echo $td->nombreTipoDocumento ?></div>
            <?php endforeach ?>
        </div>
      </div>
  </div>
    <div class="field">
      <label>Documento</label>
      <input class="requerido" placeholder="10538543298" type="text" id="documento">
    </div>
</div>
<div class="two fields">
    <div class="field">
      <label>Nombre Completo</label>
      <input class="requerido" placeholder="Nombres" type="text" id="nombreCompleto">
  </div>
  <div class="field">
      <label>Primer Apellido</label>
      <input class="requerido" placeholder="Primer apellido" type="text" id="primerApellido">
  </div>
</div>
<div class="two fields">
    <div class="field">
      <label>Segundo Apellido</label>
      <input placeholder="Segundo apellido" type="text" id="segundoApellido">
  </div>
  <div class="field">
    
  </div>
</div>
<div class="two fields">
  <div class="field">
    <label >Seleccione el tipo de genero</label>
    <div id="tipoGenero" class="ui selection dropdown">
        <input type="hidden" name="gender">
          <div class="default text">Tipo genero</div>
          <i class="dropdown icon"></i>
        <div class="menu">
            <div class="item" data-value="masculino">Masculino</div>
            <div class="item" data-value="femenino">Femenino</div>
        </div>
    </div>
  </div>
    <div class="field">
            <label >Seleccione el tipo de sangre</label>
        <div id="tipoSangre" class="ui selection dropdown">
          <input type="hidden" name="gender">
          <div class="default text">Tipo de sangre</div>
          <i class="dropdown icon"></i>
          <div class="menu">
              <div class="item" data-value="o+">o+</div>
              <div class="item" data-value="o-">o-</div>
              <div class="item" data-value="Ab+">Ab+</div>
              <div class="item" data-value="Ab-">Ab-</div>
          </div>
        </div>
    </div>
  </div>
  </form>
    <div  id="mensajePersona"></div><br>
    <div id="guardarPersona" class="button ui green">Guardar</div>
    <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
      <div class="button ui red">Cancelar</div>
    </a>
</div>
