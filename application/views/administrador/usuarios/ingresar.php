<?php if (($this->session->userdata('rol')==1)): ?>
<div class="ui grid">
  <div class="row">
    <div class="column two wide"></div>
    <div class="column twelve wide">
<div class="ui warning form green segment">
  <form>
    <h5 class="ui header red center aligned">(*) Los campos con este signo, son obligatorios!</h5>
  <div class="two fields">
    <div class="field required">
      <label>Documento</label>
      <div class="ui action input">
      <input type="text" class="requerido" id="documentoUsuario" placeholder="Documento-Min 11 digitos" data-minimo="8" data-maximo="11">
        <button class="ui icon button">
          <i class="refresh icon"></i>
        </button>
      </div>
    </div>
<div class="field">
      <label >Seleccione el area - &nbsp;&nbsp;<a class="modalGenerico hover"  data-select="areaId" data-formulario="area" data-titulo="Agregar una nueva Area">Nueva area</a></label>
      <div id="areaId" class="ui selection dropdown">
          <input type="hidden" name="gender">
          <div class="default text">Area</div>
            <i class="dropdown icon"></i>
          <div class="menu">
            <?php foreach ($area as $ar): ?>
              <div class="item" data-value="<?php echo $ar->idArea ?>"><?php echo $ar->nombreArea ?></div>
            <?php endforeach ?>
          </div>
      </div>
  </div>
  </div>
  <div class="two fields">
    <div class="field required" >
    <label>Contrase&ntilde;a</label>
    <input class="requerido" id="password" placeholder="Contraseña" type="password">
  </div>
  <div class="field required">
        <label >Nombre de usuario</label>
        <input class="requerido" type="text" data-tipo="texto" data-minimo="4" data-maximo="12" placeholder="Nombre de usuario" id="nombreUsuario">
  </div>
</div>

  <div class="two fields">
  <div class="field required">
            <label >Seleccione el rol</label>
      <div id="rolId" class="ui selection dropdown">
            <input class="requerido" type="hidden" name="gender">
          <div class="default text">Rol</div>
            <i class="dropdown icon"></i>
          <div class="menu">
            <?php foreach ($rol as $r): ?>
              <div class="item" data-value="<?php echo $r->idRol ?>"><?php echo $r->nombreRol ?></div>
            <?php endforeach ?>
          </div>
      </div>
  </div>
  <div class="field">
      <label >Seleccione el cargo - &nbsp;&nbsp;<a class="modalGenerico hover" data-select="cargoId" data-formulario="cargo" data-titulo="Agregar un nuevo cargo">Nuevo cargo</a></label>
      <div id="cargoId" class="ui selection dropdown">
        <input type="hidden" name="gender">
            <div class="default text">Cargo</div>
            <i class="dropdown icon"></i>
        <div class="menu">
            <?php foreach ($tipoCargos as $tc): ?>
              <div class="item" data-value="<?php echo $tc->idcargos ?>"><?php echo $tc->nombreCargo ?></div>
            <?php endforeach ?>
        </div>
    </div>
</div>
</div>
</form>
    <div  id="mensajeUsuario"></div><br>
    <div class="form ui segment blue center aligned">
        <div id="guardarUsuario" class="button ui green">Guardar</div>
        <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
          <div class="button ui red">Cancelar</div>
        </a>
    </div>
<?php endif ?>
</div>
<div class="column two wide"></div>
</div>

<!-- codigo de generico del modal -->
<div class="ui modal generico">
  <i class="close icon cerrarModalGenerico"></i>
  <div class="header">
    
  </div>
  <div class=" content">
  </div>
</div>

