<div class="grid ui">
  <div class="row">
    <div class="column two wide"></div>
    <div class="column twelve wide">
<?php foreach($vinculacion as $v): ?>
<div class="ui warning form green segment">
  <form>
    <h5 class="ui header red center aligned">(*) Los campos con este signo, son obligatorios!</h5>
  <div class="two fields">
    <div class="field required">
        <label >Documento</label>
        <div class="ui action input">
          <input class="requerido" value="<?php echo $v->documento ?>" type="text" placeholder="Documento" data-tipo="numero" id="documentoVinculacion" data-minimo="8" data-maximo="10" disabled>
        </div>
    </div>
  <div class="field required">
        <label >Cargo - &nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/cargoC/menu/agregar" target="_blank">Nuevo cargo</a></label>
        <select id="cargoId" class="ui dropdown">
          <?php foreach ($cargo as $c): ?>
                <option class="item "<?php if($c->idcargos == $v->cargoId) echo "selected='true'"?> value="<?php echo $c->idcargos ?>"><?php echo $c->nombreCargo ?></option>
          <?php endforeach ?>
        </select>
    </div>
    </div>

<div class="two fields">
  <div class="field required">
        <label >Tipo de programa - &nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/programaC/menu/agregar" target="_blank">Nuevo programa</a></label>
        <select id="tipoDePrograma" class="ui dropdown">
          <?php foreach ($programa as $p): ?>
                <option class="item "<?php if($p->idTipoPrograma == $v->tipoDePrograma) echo "selected='true'"?> value="<?php echo $p->idTipoPrograma ?>"><?php echo $p->nombreTipoPrograma ?></option>
          <?php endforeach ?>
        </select>
    </div>
    <div class="field required">
        <label >Tipo de vinculacion - &nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/tipovinculacionC/menu/agregar" target="_blank">Nuevo tipo de vinculacion</a></label>
         <select id="tipoVinculacion" class="ui dropdown">
          <?php foreach ($tipoVinculacion as $tv): ?>
                <option class="item "<?php if($tv->idTipoVinculacion == $v->tipoVinculacion) echo "selected='true'"?> value="<?php echo $tv->idTipoVinculacion ?>"><?php echo $tv->nombreTipoVinculacion ?></option>
          <?php endforeach ?>
        </select>
    </div>
    </div>
<div class="two fields">
  <div class="field required">
        <label >Fecha de Ingreso</label>
        <input value="<?php echo $v->fechaIngreso ?>" id="fechaIngreso" class="requerido" id="fechaI" type="date" >
    </div>
    <div class="field required">
        <label >Fecha de Termino</label>
        <input id="fechaTermino" value="<?php echo $v->fechaTermino ?>" class="requerido" id="fechaT" type="date" >
    </div>
</div>
<div class="two fields">
  <div class="field required">
        <label >Calificacion</label>
        <input value="<?php echo $v->calificacion ?>" id="calificacion" data-tipo="numero" min="1" max="10" clas="requerido" placeholder="Calificacion" type="number" data-minimo="1" data-maximo="2">
    </div>
    <div class="field required">
        <label>Sueldo</label>
        <input id="sueldo" type="number" value="<?php echo $v->sueldo ?>" data-tipo="numero" placeholder="Sueldo">
    </div>
</div>
<div class="field">
  <div class="field required">
        <label>Observacion</label>
        <textarea id="observacionVinculacion" placeholder="<?php echo $v->observacionVinculacion ?>"></textarea>
    </div>
  <div class="field">

  </div>
</div>
</form>
</div>

<div class="ui grid">
  <div class="row">
    <div class="column one wide"></div>
    <div class="column sixteen wide">
      <div class="form ui segment blue center aligned">
        <div  id="mensajeVinculacion"></div><br>
        <div data-valor="<?php echo $v->idDatoVinculacion; ?>" id="actualizarVinculacion" class="button ui green">Actualizar</div>
        <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
          <div class="button ui red">Cancelar</div>
        </a>
      </div>
    </div>
    <div class="column two wide"></div>
  </div>
</div>

<?php endforeach ?>
<?php if (!$vinculacion): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron vinculaciones por el parametro de busqueda</td>
  </tr>
<?php endif ?>

<!-- codigo de generico del modal -->
<div class="ui modal generico">
  <i class="close icon cerrarModalGenerico"></i>
  <div class="header">
    
  </div>
  <div class=" content">
  </div>
</div>