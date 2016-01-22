<?php if (!isset($informacion->nombreCompleto)): ?>
	<div class="ui grid">
	<div class="row"></div>
	<div class="row"></div>
	<div class="row">
		<button onclick="window.close()" class="ui button red"><i class="remove icon"></i>Cerrar</button>
		<i class="thumbs outline up icon">X</i>
		<div class="column two wide"></div>
		<div class="column five wide">
			<h4 class="ui horizontal green divider header"><i class="user icon"></i> Informacion General </h4>
			<table class="ui unstackable table">
				  <thead>
				    <tr>
				      <th colspan="2">Datos generales de la persona</th>
				    </tr>
			        </thead>
			        <tbody class="negrita">
			        	<tr>
			        		<td class="ui negative message">No se encontraron datos</td>
			        	</tr>
			        </tbody>
			</table>
		</div>
		<div class="column one wide"></div>
		<div class="column five wide">
			<h4 class="ui horizontal green divider header"><i class="user icon"></i>Informacion Personal</h4>
			<table class="ui unstackable table">
				  <thead>
				    <tr>
				      <th colspan="2">Datos personales de la persona</th>
				    </tr>
			        </thead>
			        <tbody class="negrita">
			        	<!-- documento, profesionId, fechaIngreso, cargoAspiracion, telefono, celular, direccion, -->
			        	<tr>
			        		<td class="ui negative message">No se encontraron datos</td>
			        	</tr>
			        </tbody>
			</table>
		</div>
		<div class="column one wide"></div>
	</div>
</div>
<?php else: ?>

<div class="ui grid">
	<div class="row"></div>
	<div class="row">
			<div class="column seven wide"></div>
			<div class="column four wide">
				<?php if ($informacion->foto): ?>
				<img class="ui  small image" id="imagen" src="<?php echo base_url() ?>soportes/fotosUsuario/<?php echo $informacion->foto?>">

				<?php else: ?>
				<img class="ui  small image" id="imagen" src="<?php echo base_url() ?>publico/img/esteban.png">
					
				<?php endif ?>
			</div>
			<div class="column two wide"></div>
	</div>
	<div class="row">
		<button  onclick="window.close()" class="ui button red"><i class="remove icon"></i>Cerrar&nbsp;&nbsp;&nbsp;&nbsp;</button>
		<div class="column one wide"></div>
		<div class="column five wide">
			<h4 class="ui horizontal green divider header"><i class="user icon"></i> Informacion General </h4>
			<table class="ui unstackable table">
				  <thead>
				    <tr>
				      <th colspan="2"></i>Datos generales de la persona
				     	<i class="pointing right icon"></i>
				      	<a href=""><?php echo $informacion->documento ?></a>
				      </th>
				    </tr>
			        </thead>
			        <tbody class="negrita">
			        	<tr>
			        		<td>Nombre</td>
			        		<td><?php echo $informacion->nombreCompleto ?></td>
			        	</tr>
			        	<tr>
			        		<td>Primer apellido</td>
			        		<td><?php echo $informacion->primerApellido ?></td>
			        	</tr>
			        	<tr>
			        		<td>Segundo Apellido</td>
			        		<td><?php echo $informacion->segundoApellido ?></td>
			        	</tr>
			        	<tr>
			        		<td>Tipo documento</td>
			        		<td><?php echo $informacion->nombreTipoDocumento ?></td>
			        	</tr>
			        	<tr>
			        		<td>Email</td>
			        		<td><?php echo $informacion->email ?></td>
			        	</tr>
			        	<tr>
			        		<td>Genero</td>
			        		<td>
			        			<?php if ($informacion->tipoGenero == 1): ?>
			        			<i class="man icon"></i>
			        				Masculino
			        			<?php else: ?>
			        			<i class="woman icon"></i>
			        				Femenino
			        			<?php endif ?>
			        		</td>
			        	</tr>
			        </tbody>
			</table>
		</div>
		<div class="column one wide"></div>
		<div class="column five wide">
			<h4 class="ui horizontal green divider header"><i class="user icon"></i>Informacion Personal</h4>
			<table class="ui unstackable table">
				  <thead>
				    <tr>
				      <th colspan="3"></i>Datos personales de la persona 
				      	<i class="pointing right icon"></i>
				      	<a href=""><?php echo $informacion->documento ?></a>
				      </th>
				    </tr>
			        </thead>
			        <tbody class="negrita">
			        	<!-- documento, profesionId, fechaIngreso, cargoAspiracion, telefono, celular, direccion, -->
			        	<tr>
			        		<td>Profesion</td>
			        		<td><?php echo $informacion->nombreProfesion ?></td>
			        	</tr>
			        	<tr>
			        		<td>Fecha Ingreso</td>
			        		<td><?php echo $informacion->fechaIngreso ?></td>
			        	</tr>
			        	<tr>
			        		<td>Cargo al que aspira</td>
			        		<td><?php echo $informacion->nombreCargo ?></td>
			        	</tr>
			        	<tr>
			        		<td>Telefono</td>
			        		<td><?php echo $informacion->telefono ?></td>
			        	</tr>
			        	<tr>
			        		<td>Celular</td>
			        		<td><?php echo $informacion->celular ?></td>
			        	</tr>
			        	<tr>
			        		<td>Direccion</td>
			        		<td><?php echo $informacion->direccion ?></td>
			        	</tr>
			        </tbody>
			</table>
		</div>
		<div class="column one wide"></div>
	</div>
</div>
<?php endif ?>
