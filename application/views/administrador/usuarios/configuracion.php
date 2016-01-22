<div class="ui grid">
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
	<div class="row">
		<div class="column five wide"></div>
		<div class="column six wide">

			<div class="segment ui form blue">
				<label for="" class="ui label attached top">Actualizar contraseña</label>
				<div class="field required" ><label for="">Contraseña anterior</label><input class="requerido" id="claveAnterior" type="password"></div>
				<div class="field required"><label for="">Nueva contraseña</label><input class="requerido" id="nuevaClave" type="password"></div>
				<div class="field required"><label for="">Repetir nueva contraseña</label><input class="requerido" id="confirmarClave" type="password"></div>
				<div class="ui button green" id="actualizarClave">Actualizar</div>
				<a class="ui button red" href="<?php echo base_url() ?>index.php/usuarioC/inicio">Cancelar</a>
			</div>
		</div>
		<div class="column one wide"></div>
	</div>
</div>