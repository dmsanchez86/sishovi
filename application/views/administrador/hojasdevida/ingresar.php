<div class="grid ui">
	<div class="row">
		<div class="column two wide"></div>
		<div class="column twelve wide">
		<div class="ui segment  blue form">
			<h3 class="ui horizontal teal divider header"><i class="users icon"></i>Informacion General</h3>
			<div class="ui form segment purple">
				<img class="ui centered small image" id="imagen" src="<?php echo base_url() ?>publico/img/esteban.png">
				<div class="three fields">
				<br>
					<div class="field"></div>
					<div class="field">
					<form id="formularioFoto">
						<div class='ui action input fluid'>
					        <input type='text' id='_fotoUsuario' readonly='true' placeholder='Solo archivos jpg, png o jpeg y max 1mb'>
					        <label for='fotoUsuario' class='ui icon button teal btn-file' data-content='hola' >
					             <i class='photo icon'></i>
					             <input class="foto" type='file' id='fotoUsuario' name='archivo' style='display: none'>
					             <input class="rutafoto" type='hidden' name='rutafoto' style='display: none'>
					        </label>			 
						</div>
						<br>
					</form>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
				<div class="ui center buttons">
					  <button id="borrarFoto" class="ui negative button">Borrar foto</button>
					  <div class="or" data-text="O"></div>
					  <button id="btnFoto"  class="ui positive button">Cargar foto</button>
					</div>
				</div>
					<div class="field"></div>
				</div>
				<br>
			<div class="three fields">
			<div class="field required">
			  <label >Documento</label>
				<div class="ui action input">
				  <input type="text"  autofocus placeholder="Documento" id="documento" data-tipo="numero" data-minimo="8" data-maximo="10">
				  <button class="ui icon button">
				    <i class="refresh icon"></i>
				  </button>
				</div>
			</div>
        	<div class="field required validar">
        		<label >Tipo de documento - &nbsp;&nbsp;<a class="modalGenerico hover"  data-select="tipoDocumento" data-formulario="tipoDocumento" data-titulo="Agregar un nuevo tipo de documento">Nuevo tipo</a></label>
        		<div id="tipoDocumento" class="ui selection dropdown">
			    <input type="hidden" name="gender">
			    <div class="default text">Tipo de documento</div>
			    <i class="dropdown icon"></i>
			    <div class="menu">
			      <?php foreach ($tipoDocumento as $td): ?>
				      <div class="item" data-value="<?php echo $td->idTipoDocumento ?>"><?php echo $td->nombreTipoDocumento ?></div>
			      <?php endforeach ?>
			    </div>
			  </div>
        	</div>
				<div class="field required validar">
				  <label >Nombres</label>
				  <input id="nombre" type="text" data-tipo="texto" data-minimo="3" data-maximo="30"  placeholder="Nombres">
				</div>
		
			</div>
			<div class="four fields">
			<div class="field required validar">
				<label >Primer Apellido</label>
				<input id="PrimerApellido" type="text" data-tipo="texto" data-minimo="3" data-maximo="20" placeholder="Primer apellido">
			</div>
			<div class="field required validar">
			  <label >Segundo Apellido</label>
			  <input id="SegundoApellido"  type="text" data-tipo="texto" data-minimo="3" data-maximo="20"  placeholder="Segundo apellido">
			</div>
			<div class="field validar">
				<label >Email</label>
				<input id="email" type="email" data-minimo="3" data-maximo="80" placeholder="Email">
			</div>
        	<div class="field required validar">
        		<label >Seleccione el tipo de genero</label>
        		<div id="TipoGenero" class="ui selection dropdown">
			    <input type="hidden" name="gender">
			    <div class="default text">Genero</div>
			    <i class="dropdown icon"></i>
			    <div class="menu">
				      <div class="item" data-value="1">Masculino</div>
				      <div class="item" data-value="2">Femenino</div>
			    </div>
			  </div>
        	</div>
			</div>
		</div>
	</div>
</div>
</div>
	<div class="row">
		<div class="column two wide"></div>
		<div class="column twelve wide">
		<div class="ui segment  blue form">
			<h3 class="ui horizontal teal divider header"><i class="user icon"></i>Informacion Personal</h3>
			<div class="ui form segment purple">
			<div class="three fields">
			<div class="field">
			  <label >Telefono</label>
			  <input id="telefono" type="text" data-tipo="numero" data-minimo="7" data-maximo="8"  placeholder="Telefono" >
			</div>
				<div class="field required">
				  <label >Celular</label>
				  <input id="celular" data-tipo="numero" type="text" data-minimo="3" data-maximo="30"  placeholder="Celular">
				</div>
				<div class="field validar">
				  <label >Direccion</label>
				  <input id="direccion" data-minimo="3" data-maximo="30" type="text"   placeholder="Direccion">
				</div>
			</div>

			<div class="two fields">
        	<div class="field required validar">
        		<label >Seleccione su profesion - &nbsp;&nbsp;<a class="modalGenerico hover"  data-select="profesion" data-formulario="profesion" data-titulo="Agregar una nueva profesion">Nueva profesion</a></label>
        		<div id="profesion" class="ui selection dropdown">
			    <input type="hidden" name="gender">
			    <div class="default text">Profesion</div>
			    <i class="dropdown icon"></i>
			    <div class="menu">
			      <?php foreach ($tipoProfession as $tp): ?>
				      <div class="item" data-value="<?php echo $tp->idProfesion ?>"><?php echo $tp->nombreProfesion ?></div>
			      <?php endforeach ?>
			    </div>
			  </div>
        	</div>
        	<div class="field required validar">
        		<label>Cargo al que aspira - &nbsp;&nbsp;<a class="modalGenerico hover" data-select="cargoId" data-formulario="cargo" data-titulo="Agregar un nuevo cargo">Nuevo cargo</a></label>
        		<div id="cargoId"  class="ui selection dropdown">
			    <input type="hidden" name="gender">
			    <div class="default text">Cargo al que aspira</div>
			    <i class="dropdown icon"></i>
			    <div class="menu">
			      <?php foreach ($tipoCargos as $tc): ?>
				      <div class="item" data-value="<?php echo $tc->idcargos ?>"><?php echo $tc->nombreCargo ?></div>
			      <?php endforeach ?>
			    </div>
			  </div>
        	</div>

			</div>
		</div>
	</div>
</div>
</div>

	<div class="row">
		<div class="column two wide"></div>
		<div class="column twelve wide">
			<div class="ui segment  blue">
				<div class="four fields">
					<div class="twelve wide field">	
						<h3 class="ui horizontal teal divider header"><i class="building icon"></i>Experiencia laboral</h3>
					</div>
				</div>
		<div class="ui segment purple form">
			<div class="four fields">
        	<div class="field required">
        		<label >Empresa - &nbsp;&nbsp;<a class="modalGenerico hover" data-select="empresa" data-formulario="empresa" data-titulo="Agregar una nueva empresa">Nueva empresa</a></label>
        		<div id="empresa" class="ui selection dropdown experiencia">
			    <input class="requerido experiencia" type="hidden" name="gender">
			    <div class="default text">Empresa</div>
			    <i class="dropdown icon"></i>
			    <div class="menu">
			      <?php foreach ($empresa as $e): ?>
				      <div class="item" data-value="<?php echo $e->idEmpresa ?>"><?php echo $e->nombreEmpresa ?></div>
			      <?php endforeach ?>
			    </div>
			  </div>
        	</div>
        	<div class="field required">
        		<label >Cargo que ocupo - &nbsp;&nbsp;<a class="modalGenerico hover" data-select="cargo" data-formulario="cargo" data-titulo="Agregar un nuevo cargo">Nuevo cargo</a></label>
        		<div id="cargo" class="ui selection dropdown experiencia">
			    <input class="requerido experiencia" type="hidden" name="gender">
			    <div class="default text">Cargo que ocupo</div>
			    <i class="dropdown icon"></i>
			    <div class="menu">
			      <?php foreach ($tipoCargos as $tc): ?>
				      <div class="item" data-value="<?php echo $tc->idcargos ?>"><?php echo $tc->nombreCargo ?></div>
			      <?php endforeach ?>
			    </div>
			  </div>
        	</div>
        	<div class="field">
        		<label >Fecha de inicio</label>
				  <input id="fechaI" type="date" >
        	</div>
	        	<div class="field">
	        		<label >Fecha de termino</label>
					<input id="fechaF" type="date" >
	        	</div>
			</div>
			<div class="two fields">
	        	<div class="field">
	        		<label >Nombre jefe inmediato</label>
				  <input class="experiencia"  id="jefe" type="text" data-tipo="texto" data-minimo="3" data-maximo="30" placeholder="Jefe inmediato">

	        	</div>
	        	<div class="field">
	        		<label >Telefono</label>
					<input class="experiencia" id="tel" type="text" data-tipo="numero" data-minimo="3" data-maximo="30"  placeholder="Telefono de la empresa">
	        	</div>

			</div>
			<div class="field required">
				<label>Descripcion tareas realizadas</label>
				<textarea class="experiencia" data-tipo="texto" id="inf" placeholder="..."></textarea>
			</div>
			<div class="field">
				<div id="btnFormExp" class="ui primary button">
				  Agregar&nbsp;&nbsp;<i class="plus icon"></i>
				</div>
			</div>
		</div> 
<table id="tablaExp" style="display:none" class="ui table">
  <thead>
    <tr>
      <th>Empresa<th>
      <th>Cargo</th>
      <th>Fecha de inicio</th>
      <th>Fecha de fin</th>
      <th>Jefe inmediato</th>
      <th>Telefono</th>
      <th>Informacion</th>
      <th>Remover</th>
    </tr>
  </thead>
  		<tbody id="filaExp">
  	
  		</tbody>
  </table>	
		</div>
	</div>
</div>

<div class="row">
	<div class="column two wide"></div>
	<div class="column twelve wide">
		<div class="ui segment  blue form">
			<h3 class="ui horizontal teal divider header"><i class="file word outline icon"></i>Certificados y documentos</h3>
			<div class="ui form segment purple">
			<div class="three fields">
			<div class="field required">
			    <label >Seleccione el tipo de soporte - &nbsp;&nbsp;<a class="modalGenerico hover" data-select="soporteTipo" data-formulario="soporte" data-titulo="Agregar un nuevo tipo de soporte">Nuevo soporte</a></label>
        		<div id="soporteTipo" class="ui selection dropdown certificado">
			    <input class="requerido1" type="hidden" name="gender">
			    <div class="default text">Tipo de soporte</div>
			    <i class="dropdown icon"></i>
			    <div class="menu">
			      <?php foreach ($tipoSoporte as $ts): ?>
				      <div class="item" data-value="<?php echo $ts->idSoporte ?>"><?php echo $ts->nombreSoporte ?></div>
			      <?php endforeach ?>
			    </div>
			  </div>
			</div>
				<div class="field">
				  <label >Observacion</label>
				  <textarea class="certificado" id="observacionFile" rows="1"></textarea>
				</div>
				<div class="field">
				  <label >Agregar soporte a enviar</label>
				 	<div id="agregarSoporte" class="ui primary button">Agregar&nbsp;&nbsp;<i class="plus icon"></i></div>
				</div>
			</div>
		<form id="fmr_archivos" method="post">
			<table id="tablaAnexo" style="display:none" class="ui table">
			  <thead>
			    <tr>
			      <th colspan="1">Tipo de Soporte<th>
			      <th>Observacion</th>
			      <th>Archivo</th>
			      <th>Remover</th>
			    </tr>
			  </thead>
				  <tbody id="filaAnexo">
				  	<tr>

				  	</tr>
				  </tbody>
			  </table>	
			  	<!-- <input type="file" name="soportes"> -->
			  </form>
		</div>
	</div>
</div>
</div>

<div class="ui grid">
	<div class="row">
		<div class="column two wide"></div>
		<div class="column twelve wide">
			<div id="mensajeHoja"></div>
			<div class="form ui segment blue center aligned">
				<div id="guardarHojaVida" class="button ui green">Guardar</div>
				<a href="<?php echo base_url() ?>index.php/usuarioC/inicio">
    				<div href="" class="button ui red">Cancelar</div>
 			 	</a>
			</div>
		</div>
		<div class="column two wide"></div>
	</div>
</div>

<!-- codigo de generico del modal -->
<div class="ui modal generico">
  <i class="close icon cerrarModalGenerico"></i>
  <div class="header">
    
  </div>
  <div class=" content">
  </div>
</div>