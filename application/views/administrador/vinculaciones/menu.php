<div class="ui grid">
	<div class="row">
		<div class="column three wide"></div>
		<div class="column twelve wide">
		
			<div class="ui  steps">
			  <a href="<?php echo base_url() ?>index.php/vinculacionC/menu/consultar" class="<?php if ($operacion=="consultar") echo "active"?> step">
			    <div class="content">
			      <div class="title">Consultar</div>
			      <div class="description">Consulte una o muchas vinculaciones</div>
			    </div>
			  </a>
			  <a class=" <?php if ($operacion=="agregar") echo "active"?> step">
			    <div class="content">
			      <div class="title">Ingresar</div>
			      <div class="description">Ingrese una nueva vinculacion</div>
			    </div>
			  </a>
			  <a class=" <?php if ($operacion=="actualizar") echo "active"?> step">
			    <div class="content">
			      <div class="title">Actualizar</div>
			      <div class="description">Actualice los datos de una o muchas vinculaciones</div>
			    </div>
			    </a>
			  </div>
			</div>

		</div>
		<div class="column two wide"></div>
	</div>
</div>