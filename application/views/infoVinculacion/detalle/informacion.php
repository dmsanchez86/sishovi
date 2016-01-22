<?php if (!$informacion): ?>
	<div class="ui grid">
	<div class="row"></div>
	<div class="row"></div>
	<div class="row">
		<button onclick="window.close()" class="ui button red"><i class="remove icon"></i>Cerrar</button>
		<i class="thumbs outline up icon">X</i>
		<div class="column four wide"></div>
		<div class="column six wide">
			<h4 class="ui horizontal green divider header"><i class="user icon"></i> Informacion General </h4>
			<table class="ui unstackable table">
				  <thead>
				    <tr>
				      <th class="center aligned" colspan="2">Datos generales de la vinculacion</th>
				    </tr>
			        </thead>
			        <tbody class="negrita">
			        	<tr>
			        		<td class="ui negative message">No se encontraron datos</td>
			        	</tr>
			        </tbody>
			</table>
		</div>
<?php else: ?>

<div class="ui grid">
	<div class="row"></div>
	<div class="row"></div>
	<div class="row">
		<button onclick="window.close()" class="ui button red"><i class="remove icon"></i>Cerrar&nbsp;&nbsp;&nbsp;&nbsp;</button>
		<div class="column two wide"></div>
		<div class="column ten wide">
			<h4 class="ui horizontal teal divider header"><i class="user icon"></i> Datos de la vinculacion </h4>
			<table class="ui celled unstackable table">
				<?php foreach ($informacion as $info): ?>
				  <thead>
				    <tr>
				      <th class="center aligned" colspan="2"></i>Datos generales de la vinculacion</th>
				    </tr>
			        </thead>
			        <tbody class="negrita">
			        	<tr>
			        		<td>Documento</td>
			        		<td class="center aligned"><a href="#"><?php echo $info->documento ?></a></td>
			        	</tr>
			        	<tr>
			        		<td>Nombre completo</td>
			        		<td class="center aligned"><?php echo $info->nombreCompleto ?> <?php echo $info->primerApellido ?> <?php echo $info->segundoApellido ?></td>
			        	</tr>
			        	<tr>
			        		<td>Cargo que ocupa/o</td>
			        		<td class="center aligned"><?php echo $info->nombreCargo ?></td>
			        	</tr>
			        	<tr>
			        		<td>Programa</td>
			        		<td class="center aligned"><?php echo $info->nombreTipoPrograma ?></td>
			        	</tr>
			        	<tr>
			        		<td>Eps</td>
			        		<td class="center aligned"><?php echo $info->eps ?></td>
			        	</tr>
			        	<tr>
			        		<td>Fondo empleado</td>
			        		<td class="center aligned"><?php echo $info->fondoEmpleado ?></td>
			        	</tr>
			        	<tr>
			        		<td>Tipo de vinculación</td>
			        		<td class="center aligned"><?php echo $info->nombreTipoVinculacion ?></td>
			        	</tr>
			        	<tr>
			        		<td>Salario</td>
			        		<td class="center aligned">$<?php echo $info->sueldo ?></td>
			        	</tr>
			        	<tr>
			        		<td><i class="visa icon"></i>Cuenta Bancaria</td>
			        		<td class="center aligned"><?php echo $info->cuentaBancaria ?></td>
			        	</tr>
			        	<tr>
			        		<td>Fecha ingreso</td>
			        		<td class="center aligned"><?php echo $info->fechaIngreso ?></td>
			        	</tr>
			        	<tr>
			        		<td>Fecha termino de la vinculación</td>
			        		<td class="center aligned"><?php echo $info->fechaTermino ?></td>
			        	</tr>
			        	<tr>
			        		<td>Calificación obtenida</td>
			        		<td class="center aligned"><?php echo $info->calificacion ?></td>
			        	</tr>
			        	<tr>
			        		<td>Observación</td>
			        		<td class="center aligned"><?php echo $info->observacionVinculacion ?></td>
			        	</tr>
			        	<tr>
			        		<td>Fecha en que se desvinculo</td>
			        		<?php if ($info->fechaDesvinculacion): ?>
			        			<td class="center aligned"><?php echo $info->fechaDesvinculacion ?></td>
			        		<?php else: ?>
			        			<td class="center aligned">No se ha desvinculado</td>
			        		<?php endif ?>
			        	</tr>
			        	<tr>
			        		<td>Razon de la desvinculación</td>
			        		<td class="center aligned"><?php echo $info->razon ?></td>
			        	</tr>
			        	<tr>
			        		<td>Observacion de la desvinculacion</td>
			        		<td class="center aligned"><?php echo $info->detalleDesvinculacion ?></td>
			        	</tr>
			        </tbody>
			</table>
			<?php endforeach ?>
		</div>
<?php endif ?>
