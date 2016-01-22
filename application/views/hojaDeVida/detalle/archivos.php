<?php if (!$soportes): ?>
	<div class="ui grid">

	<div class="row">
		<div class="column one wide"></div>
		<div class="column fourteen wide">
			<h4 class="ui horizontal blue divider header"><i class="file word outline icon"></i> Documentos - Soportes </h4>
			<div class="ui form">
					<div class="field">
						<!-- idSoporte, archivoRuta, tipoSoporte, documento, descripcion -->
					<table class="ui unstackable table">
						<thead>
							<tr>
								<th><i class="folder open outline icon"></i>Tipo de soporte</th>
							</tr>
						</thead>
						<tbody class="negrita">
							<tr>
								<td class="ui negative message">No se encontraron documentos de esta persona</td>
							</tr>
						</tbody>
					</table>
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
			<h4 class="ui horizontal teal divider header"><i class="file word outline icon"></i> Documentos - Soportes </h4>
			<div class="ui form">
					<div class="field">
		
									<table id="tablaSoportes" class="ui celled unstackable table">
									  <thead>
									    <tr>
									      <th><i class="folder open outline icon"></i>Tipo de soporte</th>
									      <th><i class="info icon"></i>Observación</th>
									      <th><i class="download icon"></i> Descargar</th>
									    </tr>
								        </thead>
								        <tbody> 
					<?php foreach ($soportes as $ar): ?>
								        	<tr>
								        		<td><?php echo $ar->nombreSoporte ?></td>
								        		<td><?php echo $ar->descripcion ?></td>
								        		<td><a class="ui button blue" target="descargar" href="<?php echo base_url() ?>index.php/uploadC/descargar/<?php echo $documento ?>/<?php echo $ar->idSoporte ?>">Descargar</a></td>
								        	</tr>
					 <?php endforeach ?>
								        </tbody>
								    </table>
					</div>
			</div>
		</div>
		<div class="column one wide"></div>
	</div>
</div>
<?php endif ?>
