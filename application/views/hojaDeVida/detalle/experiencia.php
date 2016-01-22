<?php if (!$experiencia): ?>
	<div class="ui grid">
	<div class="row">
		<div class="column one wide"></div>
		<div class="column fourteen wide">
			<div class="row"></div>
			<div class="row"></div>
			<h4 class="ui horizontal teal divider header"><i class="building icon"></i>Experiencia laboral</h4>
			<div class="ui form">
				<div class="two fields">
					<div class="field">
						<!-- cargoOcupo, fechaIngreso, fechaTermino, observacionTareas, nombreJefeInmediato, TelefonoEmpresa -->
						<table class="ui unstackable table">
							<thead>
							<tr>
								<th class="ui center aligned" colspan="2">Empresa: --</th>
							</tr>
							</thead>
							<tbody class="negrita">
							<tr>
								<td class="ui negative message">Esta persona no tiene experiencia laboral</td>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="column one wide"></div>
	</div>
</div>
<?php else: ?>

<div class="ui grid">
	<div class="row">
		<div class="column one wide"></div>
		<div class="column fourteen wide">
			<div class="row"></div>
			<div class="row"></div>
			<h4 class="ui horizontal teal divider header"><i class="building icon"></i>Experiencia laboral</h4>
			<div class="ui form">
				<div class="two fields">
					<?php foreach ($experiencia as $ex): ?>
					<div class="field">
						<!-- cargoOcupo, fechaIngreso, fechaTermino, observacionTareas, nombreJefeInmediato, TelefonoEmpresa -->						
									<table class="ui unstackable table">
									  <thead>
									    <tr>
									      <th class="ui center aligned" colspan="2"></i>Empresa 
									      	<i class="pointing right icon"></i>
									      	<a href=""><?php echo $ex->nombreEmpresa ?></th></a>
									    </tr>
								        </thead>
								        <tbody class="negrita">
								        	<tr>
								        		<td>Cargo que ocupo</td>
								        		<td><?php echo $ex->nombreCargo ?></td>
								        	</tr>
								        	<tr>
								        		<td>Fecha en que ingreso</td>
								        		<td><?php echo $ex->fechaIngreso ?></td>
								        	</tr>
								        	<tr>
								        		<td>Fecha en que termino</td>
								        		<td><?php echo $ex->fechaTermino ?></td>
								        	</tr>
								        	<tr>
								        		<td>Tareas que realizaba</td>
								        		<td><?php echo $ex->observacionTareas ?></td>
								        	</tr>
								        	<tr>
								        		<td>Jefe Inmediato</td>
								        		<td><?php echo $ex->nombreJefeInmediato ?></td>
								        	</tr>
								        	<tr>
								        		<td>Telefono de la empresa</td>
								        		<td><?php echo $ex->TelefonoEmpresa ?></td>
								        	</tr>
								        </tbody>
								    </table>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<div class="column one wide"></div>
	</div>
</div>
<?php endif ?>
