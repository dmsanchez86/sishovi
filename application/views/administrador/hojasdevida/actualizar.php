<div class="grid ui">
	<div class="row">
		<div class="column two wide"></div>
		<div class="column twelve wide">
		<div class="ui segment  blue form">
			<h3 class="ui horizontal teal divider header"><i class="users icon"></i>Informacion General</h3>
			<div class="ui form segment purple">
			<div class="field">
			<?php if ($hojadevida->foto): ?>
				<img class="ui centered small bordered image" id="imagen" src="<?php echo base_url() ?>soportes/fotosUsuario/<?php echo $hojadevida->foto?>">

				<?php else: ?>
				<img class="ui centered small image" id="imagen" src="<?php echo base_url() ?>publico/img/esteban.png">
					
				<?php endif ?>
			<div class="field">
			  <label >Documento</label>
				<div id="documentoActualizar" class="ui action input">
					<?php echo $hojadevida->documento; ?>
				</div>
			</div>
			</div>
				<div class="three fields">
				<div class="field required validar">
					  <label >Nombres</label>
					  <input id="nombre" type="text" data-tipo="texto" data-minimo="3" data-maximo="30"  value="<?php echo $hojadevida->nombreCompleto; ?>">
					</div>
					<div class="field required validar">
					  <label >Primer Apellido</label>
					  <input id="PrimerApellido" type="text" data-tipo="texto" data-minimo="3" data-maximo="20" value="<?php echo $hojadevida->primerApellido; ?>">
					</div>
					<div class="field required validar">
					  <label >Segundo Apellido</label>
					  <input id="SegundoApellido"  type="text" data-tipo="texto" data-minimo="3" data-maximo="20"  value="<?php echo $hojadevida->segundoApellido; ?>">
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
			  <input id="telefono" type="text" data-tipo="numero" data-minimo="7" data-maximo="8"  value="<?php echo $hojadevida->telefono ?>" >
			</div>
				<div class="field">
				  <label >Celular</label>
				  <input id="celular" data-tipo="numero" type="text" data-minimo="3" data-maximo="30"  value="<?php echo $hojadevida->celular; ?>">
				</div>
				<div class="field required validar">
				  <label >Direccion</label>
				  <input id="direccion" data-minimo="3" data-maximo="30" type="text"   value="<?php echo $hojadevida->direccion; ?>">
				</div>
			</div>

			<div class="two fields">
        	<div class="field required validar">
        		<label >Seleccione su profesion - &nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/profesionC/menu/agregar" target="_blank">Nueva profesion</a></label>
        		<select id="profesion" class="ui dropdown">
			         <?php foreach ($tipoProfession as $tp): ?>
			             <option class="item "<?php if($tp->idProfesion == $hojadevida->profesionId) echo "selected='true'"?> value="<?php echo $tp->idProfesion ?>"><?php echo $tp->nombreProfesion ?></option>
			         <?php endforeach ?>
			     </select>
			  </div>
        	<div class="field required validar">
        		<label>Cargo al que aspira - &nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/cargoC/menu/agregar" target="_blank">Nuevo cargo</a></label>
        		<select id="cargoId" class="ui dropdown">
			         <?php foreach ($tipoCargos as $c): ?>
			             <option class="item "<?php if($c->idcargos == $hojadevida->cargoAspiracion) echo "selected='true'"?> value="<?php echo $c->idcargos ?>"><?php echo $c->nombreCargo ?></option>
			         <?php endforeach ?>
			     </select>
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
		<br>
		<div class="ui segment purple form">
			<div class="four fields">
        	<div class="field required">
        		<label >Empresa - &nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/empresaC/menu/agregar" target="_blank">Nueva empresa</a></label>
        		<div id="empresa" class="ui selection dropdown experiencia">
			    <input class="requerido" type="hidden" name="gender">
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
        		<label >Cargo que ocupo - &nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/cargoC/menu/agregar" target="_blank">Nuevo cargo</a></label>
        		<div id="cargo" class="ui selection dropdown experiencia">
			    <input class="requerido" type="hidden" name="gender">
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
				  <input class="experiencia" id="fechaI" type="date" >
        	</div>
	        	<div class="field">
	        		<label >Fecha de termino</label>
					<input class="experiencia" id="fechaF" type="date" >
	        	</div>
			</div>
			<div class="two fields">
	        	<div class="field">
	        		<label >Nombre jefe inmediato</label>
				  <input class="experiencia"  id="jefe" type="text" data-tipo="texto" data-minimo="3" data-maximo="30" placeholder="Jefe inmediato">

	        	</div>
	        	<div class="field">
	        		<label >Telefono</label>
					<input class="experiencia" id="tel" type="text" data-tipo="numero" data-minimo="3" data-maximo="30"  placeholder="Telefono">
	        	</div>

			</div>
			<div class="field">
				<label >Descripcion tareas realizadas</label>
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
			<?php $this->load->view("hojaDeVida/detalle/archivos") ?>
			<div class="ui grid">
				<div class="row">
				<div class="column one wide"></div>
				<div class="column fourteen wide">
						<div class="ui segment green form">
						<label for="" class="ui label attached top">Agregar nuevos soportes</label>
						<form id="form_soporte">
							<div class="field required">
							    <label >Seleccione el tipo de soporte - &nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/tipoSopC/menu/agregar" target="_blank">Nuevo soporte</a></label>
				        		<div id="soporteTipo" class="ui selection dropdown certificado">
							    <input class="requerido1" type="hidden" name="tipo">
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
								  <input class="certificado" name="descripcion" >
								</div>
								<div class="field">
								    <div class='ui action input'>
								        <input type='text' id='_soporte' readonly='true' placeholder='solo archivos pdf, word o excel y maximo 1mb de tamaño'>
								        <label for='soporte' class='ui icon button teal btn-file' data-content='hola' >
								             <i class='upload icon'></i>
								             <input type='file' id='soporte' name='archivo' style='display: none'>
											 <input type='hidden' name='documento' value="<?php echo $documento ?>" class='txt_documento'>
								        </label>
								    </div>

								</div>
								<div class="field">
								  <label >Agregar soporte a enviar</label>
								 	<div id="subirSoporte" class="ui primary button">Agregar&nbsp;&nbsp;<i class="plus icon"></i></div>
								</div>
							</form>
						</div>			

				</div>
				<div class="column two wide"></div>
			</div>
			</div>
		<div id="fmr_archivos" method="post">
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
<!-- 				  		
 -->				</tr>
				  </tbody>
			  </table>	
			  	<!-- <input type="file" name="soportes"> -->
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
				<div id="actualizarHojaVida" class="button ui green">Actualizar</div>
				<a href="<?php echo base_url() ?>index.php/usuarioC/inicio">
    				<div href="" class="button ui red">Cancelar</div>
 			 	</a>
			</div>
		</div>
		<div class="column two wide"></div>
	</div>
</div>
<?php if (!$hojadevida): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron hojas de vida por el parametro de busqueda</td>
  </tr>
<?php endif ?>
    <div class="column two wide"></div>
  </div>
</div>