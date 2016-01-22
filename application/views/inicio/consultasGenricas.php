<?php if ($formulario === "areaId"): ?>
	      <input type="hidden" name="gender">
          <div class="default text">Area</div>
            <i class="dropdown icon"></i>
          <div class="menu">
            <?php foreach ($area as $ar): ?>
              <div class="item" data-value="<?php echo $ar->idArea ?>"><?php echo $ar->nombreArea ?></div>
            <?php endforeach ?>
          </div>
<?php endif ?>

<?php if ($formulario === "cargoId"): ?>
	   <input type="hidden" name="gender">
            <div class="default text">Cargo</div>
            <i class="dropdown icon"></i>
        <div class="menu">
            <?php foreach ($cargo as $c): ?>
              <div class="item" data-value="<?php echo $c->idcargos ?>"><?php echo $c->nombreCargo ?></div>
            <?php endforeach ?>
        </div>
<?php endif ?>

<?php if ($formulario === "cargo"): ?>
     <input type="hidden" name="gender">
            <div class="default text">Cargo</div>
            <i class="dropdown icon"></i>
        <div class="menu">
            <?php foreach ($cargo as $c): ?>
              <div class="item" data-value="<?php echo $c->idcargos ?>"><?php echo $c->nombreCargo ?></div>
            <?php endforeach ?>
        </div>
<?php endif ?>

<?php if ($formulario === "tipoDocumento"): ?>
     <input type="hidden" name="gender">
            <div class="default text">Tipo documento</div>
            <i class="dropdown icon"></i>
        <div class="menu">
            <?php foreach ($tipoDocumento as $td): ?>
              <div class="item" data-value="<?php echo $td->idTipoDocumento ?>"><?php echo $td->nombreTipoDocumento ?></div>
            <?php endforeach ?>
        </div>
<?php endif ?>

<?php if ($formulario === "profesion"): ?>
     <input type="hidden" name="gender">
            <div class="default text">Profesion</div>
            <i class="dropdown icon"></i>
        <div class="menu">
            <?php foreach ($profesion as $p): ?>
              <div class="item" data-value="<?php echo $p->idProfesion ?>"><?php echo $p->nombreProfesion ?></div>
            <?php endforeach ?>
        </div>
<?php endif ?>

<?php if ($formulario === "empresa"): ?>
     <input type="hidden" name="gender">
            <div class="default text">empresa</div>
            <i class="dropdown icon"></i>
        <div class="menu">
            <?php foreach ($empresa as $e): ?>
              <div class="item" data-value="<?php echo $e->idEmpresa ?>"><?php echo $e->nombreEmpresa ?></div>
            <?php endforeach ?>
        </div>
<?php endif ?>

<?php if ($formulario === "soporteTipo"): ?>
     <input type="hidden" name="gender">
            <div class="default text">Tipo de soporte</div>
            <i class="dropdown icon"></i>
        <div class="menu">
            <?php foreach ($soporte as $s): ?>
              <div class="item" data-value="<?php echo $s->idSoporte ?>"><?php echo $s->nombreSoporte ?></div>
            <?php endforeach ?>
        </div>
<?php endif ?>

<?php if ($formulario === "tipoDePrograma"): ?>
     <input type="hidden" name="gender">
            <div class="default text">Tipo de programa</div>
            <i class="dropdown icon"></i>
        <div class="menu">
            <?php foreach ($programa as $p): ?>
              <div class="item" data-value="<?php echo $p->idTipoPrograma ?>"><?php echo $p->nombreTipoPrograma ?></div>
            <?php endforeach ?>
        </div>
<?php endif ?>

<?php if ($formulario === "tipoVinculacion"): ?>
     <input type="hidden" name="gender">
            <div class="default text">Tipo de vinculacion</div>
            <i class="dropdown icon"></i>
        <div class="menu">
            <?php foreach ($tipovinculacion as $tv): ?>
              <div class="item" data-value="<?php echo $tv->idTipoVinculacion ?>"><?php echo $tv->nombreTipoVinculacion ?></div>
            <?php endforeach ?>
        </div>
<?php endif ?>
<script>
	$("#<?php echo $formulario ?>").dropdown();
</script>