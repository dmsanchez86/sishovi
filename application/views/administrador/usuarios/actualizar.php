 <?php if (($this->session->userdata('rol')==1)): ?>

<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">

<?php foreach ($usuario as $u): ?>
  <div class="ui warning form green segment">
  <form>
    <h5 class="ui header red center aligned">(*) Los campos con este signo, son obligatorios!</h5>
  <div class="two field">
    <div class="field">
      <label>Documento</label>
      <div class="ui action input">
      <input type="text" id="documentoUsuario" value="<?php echo $u->documentoUsuario ?>"  data-minimo="8" data-maximo="11" disabled>
      </div>
    </div>
  </div>

  <div class="two fields">
  <div class="field required">
        <label >Nombre de usuario</label>
        <input class="requerido" value="<?php echo $u->nombreUsuario ?>" type="text" data-tipo="texto" data-minimo="4" data-maximo="12"  id="nombreUsuario">
  </div>
  
  <div class="field required" >
    <div class="field required">
      <label >Seleccione la nueva area</label>
<select id="areaId" class="ui dropdown">
  <?php foreach ($area as $ar): ?>
          <option class="item "<?php if($ar->idArea == $u->areaId) echo "selected='true'"?> value="<?php echo $ar->idArea ?>"><?php echo $ar->nombreArea ?></option>
      <?php endforeach ?>
</select>


  </div>
  </div>
</div>

  <div class="two fields">
  <div class="field required">
            <label >Seleccione el nuevo rol</label>
      <select id="rolId" class="ui dropdown">
  <?php foreach ($rol as $r): ?>
          <option class="item "<?php if($r->idRol == $u->rolId) echo "selected='true'"?> value="<?php echo $r->idRol ?>"><?php echo $r->nombreRol ?></option>
      <?php endforeach ?>
</select>
  </div>



  <div class="field required">
      <label >Seleccione el nuevo cargo</label>
     <select id="cargoId" class="ui dropdown">
  <?php foreach ($cargo as $c): ?>
          <option class="item "<?php if($c->idcargos == $u->cargoId) echo "selected='true'"?> value="<?php echo $c->idcargos ?>"><?php echo $c->nombreCargo ?></option>
      <?php endforeach ?>
</select>
</div>


</div>
</form>
    <div  id="mensajeUsuario"></div><br>
    <div class="form ui segment blue center aligned">
    <div class="ui header black  aligned"></div>
        <div id="actualizarUsuario" class="button ui green">Actualizar</div>
        <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
          <div class="button ui red">Cancelar</div>
        </a>
    </div>
</div>
<?php endforeach ?>
<?php if (!$usuario): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron usuarios por el parametro de busqueda</td>
  </tr>
<?php endif ?>
    <div class="column two wide"></div>
  </div>
</div>
<?php endif ?>

<!-- codigo de generico del modal -->
<div class="ui modal generico">
  <i class="close icon cerrarModalGenerico"></i>
  <div class="header">
    
  </div>
  <div class=" content">
  </div>
</div>

