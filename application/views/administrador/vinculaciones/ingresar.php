<?php $formularioVinculacion = 0; ?>
<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column eleven wide">
  <?php foreach ($vinculacion as $datoV): ?>
    <?php if ($datoV->estadoId==1): ?>
      <table data-documento="<?php echo $datoV->documento ?>" id="tbl_titulo" class="ui blue table celled striped">
      <thead>
          <tr>
            <th colspan="3" style="float:center; color:green;"><i class="info icon"></i>Información de la persona</th>
            <th>
              <a data-content="Detalle de la vinculacion" target="detalle_<?php echo $datoV->idDatoVinculacion ?>" href="<?php echo base_url() ?>index.php/vinculacionC/detalle/<?php echo $datoV->idDatoVinculacion ?> " class="ui mini green icon button pop">
                <i class="unhidden eye icon "></i>
              </a>
            </th>
          </tr>
          <tr>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cargo</th>
          </tr>
        </thead>
      <tbody>
          <tr style="min-height: 50px;">
            <th><?php echo $datoV->documento ?></th>
            <th><?php echo $datoV->nombreCompleto ?></th>
            <th><?php echo $datoV->primerApellido ?>&nbsp;<?php echo $datoV->segundoApellido ?></th>
            <th><?php echo $datoV->nombreCargo ?></th>
          </tr>
        </tbody>
    </table>
    <div class="segment ui purple form">
        <div class="field">
            <label for="">Razón de la desvinculación</label>
            <select id="razon" class="ui dropdown requerido">
                <option value="0">--Seleccione--</option>
                <option value="Retiro voluntario">Retiro voluntario</option>
                <option value="Despido">Despido</option>
                <option value="Ausencia de trabajo">Ausencia de trabajo</option>
                <option value="Otro">Otro</option>
            </select>
            </div>
          <div class="field required">
            <label >Fecha de desvinculacion</label>
            <input id="fechaDesvinculacion" class="requerido" type="date" >
        </div>
        <div class="field">
        <label>Observaciones</label>
            <textarea id="observacion" placeholder="Observaciones"></textarea>
        </div>
        <div class="filed">
            <div data-valor="<?php echo $datoV->idDatoVinculacion; ?>" data-documento="<?php echo $datoV->documento; ?>" class="ui button red" id="desvincular">Desvincular</div>
        </div>
    </div>

    <?php endif ?>
  <?php endforeach ?>

  <?php if (!$vinculacion): ?>
          <table data-documento="<?php echo $hojadevida->documento ?>" id="tbl_titulo" class="ui small blue table celled striped">
            <thead>
                <tr>
                  <th colspan="4" style="float:center; color:green;"><i class="info icon"></i>Información de la persona</th>
                </tr>
                <tr>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cargo al que aspira</th>
                </tr>
              </thead>
            <tbody>
                <tr style="min-height: 50px;">
                  <th><?php echo $hojadevida->documento ?></th>
                  <th><?php echo $hojadevida->nombreCompleto ?></th>
                  <th><?php echo $hojadevida->primerApellido ?>&nbsp;<?php echo $hojadevida->segundoApellido ?></th>
                  <th><?php echo $hojadevida->nombreCargo ?></th>
                </tr>
              </tbody>
          </table>

<div class="segment ui purple form">
      <form>
        <h5 class="ui header red center aligned">(*) Los campos con este signo, son obligatorios!</h5>
      <div class="two fields">
        <div class="field required">
            <label>Documento</label>
            <?php echo $hojadevida->documento ?>
        </div>
      <div class="field required">
            <label >Cargo - &nbsp;&nbsp;<a class="modalGenerico hover" data-select="cargoId" data-formulario="cargo" data-titulo="Agregar un nuevo cargo">Nuevo cargo</a></label>
            <div id="cargoId" class="ui selection dropdown">
        <input class="requerido" type="hidden" name="gender">
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
    <div class="two fields">
      <div class="field required">
            <label >Tipo de programa - &nbsp;&nbsp;<a class="modalGenerico hover" data-select="tipoDePrograma" data-formulario="programa" data-titulo="Agregar un nuevo programa">Nuevo programa</a></label>
            <div id="tipoDePrograma" class="ui selection dropdown">
        <input class="requerido"  type="hidden" name="gender">
          <div class="default text">Tipo de Programa</div>
          <i class="dropdown icon"></i>
          <div class="menu">
              <?php foreach ($tipoPrograma as $tp): ?>
                <div class="item" data-value="<?php echo $tp->idTipoPrograma ?>"><?php echo $tp->nombreTipoPrograma ?></div>
              <?php endforeach ?>
          </div>
        </div>
        </div>
        <div class="field required">
            <label >Tipo de vinculación - &nbsp;&nbsp;<a class="modalGenerico hover" data-select="tipoVinculacion" data-formulario="tipoVinculacion" data-titulo="Agregar un nuevo programa">Nuevo tipo de vinculacion</a></label>
            <div id="tipoVinculacion" class="ui selection dropdown">
        <input class="requerido" type="hidden" name="gender">
          <div class="default text">Tipo de Vinculacion</div>
          <i class="dropdown icon"></i>
          <div class="menu">
              <?php foreach ($tipoVinculacion as $tv): ?>
                <div class="item" data-value="<?php echo $tv->idTipoVinculacion ?>"><?php echo $tv->nombreTipoVinculacion ?></div>
              <?php endforeach ?>
          </div>
        </div>
        </div>
    </div>
    <div class="two fields">
      <div class="field required">
            <label >Fecha de Ingreso</label>
            <input id="fechaIngreso" class="requerido" id="fechaI" type="date" >
        </div>
        <div class="field required">
            <label >Fecha de Termino</label>
            <input id="fechaTermino" class="requerido" id="fechaT" type="date" >
        </div>
    </div>
    <div class="two fields">
      <div class="field required">
            <label >Calificación</label>
            <input value="1" id="calificacion" data-tipo="numero" min="1" max="10" clas="requerido" placeholder="Calificacion" type="number" data-minimo="1" data-maximo="2">
        </div>
        <div class="field required">
            <label>Salario</label>
            <input id="sueldo" type="number" value="200000" data-tipo="numero" placeholder="Sueldo">
        </div>
    </div>
    <div class="two fields">
      <div class="field required">
            <label >Cuenta Bancaria</label>
            <input id="cuentaBancaria" data-tipo="numero"  clas="requerido" placeholder="Cuenta bancaria" >
        </div>
        <div class="field required">
        <div class="field required">
            <label >Eps</label>
            <input id="eps" data-tipo="texto"  clas="requerido" placeholder="EPS" >
        </div>
        </div>
    </div>
    <div class="two fields">
      <div class="field required">
          <label >Fondo empleado</label>
          <input id="fondoEmpleado" data-tipo="texto"  clas="requerido" placeholder="Fondo empleado" >
        </div>
        <div class="field required">
        <div class="field required">
            
        </div>
      </div>
    </div>
    <div class="field">
      <div class="field required">
            <label>Observación</label>
            <textarea id="observacionVinculacion" placeholder="Breve descripcion del porque la persona va ser vinculada"></textarea>
        </div>
      <div class="field">
            <div data-valor="<?php echo $hojadevida->documento; ?>" class="ui button green" id="guardarVinculacion">Vincular</div>
        </div>
    </div>
    </form>
  <?php endif ?>

</div>
<!-- codigo de generico del modal -->
<div class="ui modal generico">
  <i class="close icon cerrarModalGenerico"></i>
  <div class="header">
    
  </div>
  <div class=" content">
  </div>
</div>
