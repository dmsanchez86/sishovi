$('.ui.dropdown').dropdown();

$(document).on('click', '#consultarU', function(event) {
	usuario = $("#busqueda").val()
	tipo    = $("#estado").dropdown("get value")
	elem    = $(this)
	$.post(baseurl+'index.php/usuarioC/consultar', {usuario: usuario, tipo: tipo}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
});

$(document).on('click', '#consultarA', function(event) {
	$(".message").remove();
	$area = $("#busqueda").val()
	$tipo = $("#estado").dropdown("get value")
	elem  = $(this)
	$.post(baseurl+'index.php/areaC/consultar', {area: $area,tipo:$tipo}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)

	});
});
$(document).on('click', '#consultarE', function(event) {
	$empresa = $("#busqueda").val()
	$tipo    = $("#estado").dropdown("get value")
	elem     = $(this)

	$.post(baseurl+'index.php/empresaC/consultar', {empresa: $empresa,tipo: $tipo}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});

});
$(document).on('click', '#consultarC', function(event) {
	$cargo = $("#busqueda").val()
	$tipo  = $("#estado").dropdown("get value")
	elem   = $(this)
	$.post(baseurl+'index.php/cargoC/consultar', {cargo: $cargo, tipo: $tipo}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
});

$(document).on('click', '#consultarP', function(event) {
	$profesion = $("#busqueda").val()
	$tipo      = $("#estado").dropdown("get value")
	elem       = $(this)
	$.post(baseurl+'index.php/profesionC/consultar', {profesion: $profesion,tipo: $tipo}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
});

/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/
/*°°°°°°°°|																							  |°°°°°°*/
/*°°°°°°°°|		CODIGO PARA EL MODULO DE HOJAS DE VIDAD												  |°°°°°°*/
/*°°°°°°°°|																							  |°°°°°°*/
/*°°°°°°°°|																							  |°°°°°°*/
/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/

/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/
/*°°°°°°°°°°|	VARIABLES GLOBALES				|°°°°°°°°°°°°°°°*/
/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/

tablaExp             = 0;
tablaAnexo           = 0;
valida               = true;
var contadorArchivos = 1;

/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/
/*°°°°°°°°°°|	DEFINICION DE EVENTOS 				|°°°°°°°°°°°°°°°*/
/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/
$(document).ready(function() {
	
	//	consulta una hoja de vida
		$(document).on('click', '#consultarH', consultaHojasVida);
	//consulta una persona
		$(document).on('click', '#consultarPer', consultaPersona);
	//consulta un programa
		$(document).on('click', '#consultarPro', consultaPrograma);
	//Funcion que cambia de estado a un usuario
		$(document).on('click', '.estadoUsuario', estadoUsuario);
	//Funcion que cambia de estado un area
		$(document).on('click', '.estadoArea', estadoArea);
	//Funcion que cambia de estado una empresa
		$(document).on('click', '.estadoEmpresa', estadoEmpresa);
	//Funcion que cambia de estado una empresa
		$(document).on('click', '.estadoCargo', estadoCargo);
	//Funcion que cambia de estado una VINCULACION
		$(document).on('click', '.estadoVinculacion', estadoVinculacion);
	//Funcion que cambia de estado una PROFESION
		$(document).on('click', '.estadoProfesion', estadoProfesion);
	//Funcion que cambia de estado un PROGRAMA
		$(document).on('click', '.estadoPrograma', estadoPrograma);
	//Funcion que cambia de estado un TIPO DE VINCULACION
		$(document).on('click', '.estadoTipoVinculacion', estadoTipoVinculacion);
	//Funcion que cambia de estado un TIPO DE SOPORTE
		$(document).on('click', '.estadoTipoSoporte', estadoTipoSoporte);
	//consulta un tipo de vinculacion
		$(document).on('click', '#consultarV', consultaTipoVinculacion);
	//consulta una vinculacion
		$(document).on('click', '#consultarVin', consultaVinculacion);
	//consulta una tipo de soporte
		$(document).on('click', '#consultarSop', consultaSoporte);
	//consulta una tipo de soporte
		$(document).on('click', '#consultarTd', consultaDocumento);
	//	boton para agregar un nuevo formulario de experiencia de persona
		$(document).on('click', '#btnFormExp', agregaExpForm);
	//	boton para agregar un nuevo anexo de la persona persona
		$(document).on('click', '#agregarSoporte', soportes);
	//	remueve una fila del formulario
		$(document).on('click', '.remover', borrarFila);
	//  funcion agregar hoja de vida
		$(document).on('click', '#guardarHojaVida', guardarHojaVida);
	//  funcion agregar area
		$(document).on('click', '#guardarArea', guardarArea);
	//  funcion agregar empresa
		$(document).on('click', '#guardarEmpresa', guardarEmpresa);
	//  funcion agregar cargo
		$(document).on('click', '#guardarCargo', guardarCargo);
	//  funcion agregar profesion
		$(document).on('click', '#guardarProfesion', guardarProfesion);
	//  funcion agregar usuario
		$(document).on('click', '#guardarUsuario', guardarUsuario);

	//  funcion agregar tipo de programa
		$(document).on('click', '#guardarPrograma', guardarPrograma);
	//  funcion agregar tipo de vinculacion
		$(document).on('click', '#guardarTipoVinculacion', guardarTipoVinculacion);
	//  funcion agregar vinculacion
		$(document).on('click', '#guardarVinculacion', guardarVinculacion);
	//  funcion agregar tipo de soporte
		$(document).on('click', '#guardarTipoSoporte', guardarTipoSoporte);
	//  funcion agregar tipo de documento
		$(document).on('click', '#guardarTipoDocumento', guardarTipoDocumento);
	//  funcion cerrar
		$(document).on('click', '#cerrar', cerrar);
	//  funcion que verifica que el documento de una persona en la hoja de vida no este registrado
		$(document).on('keyup', '#documento', validarExistenciaPersona);
	//  funcion que verifica que el documento de un usuario no este registrado
		$(document).on('keyup', '#documentoUsuario', validarExistenciaUsuario);
	//  funcion que verifica que el documento de una persona no este vinculado
		$(document).on('keyup', '#documentoVinculacion', validarVinculacion);

	//Funcion que actualiza un area
		$(document).on('click', '#actualizarArea', actualizarArea);
		
	//Funcion que actualiza un cargo
		$(document).on('click', '#actualizarCargo', actualizarCargo);

	//Funcion que actualiza una empresa
		$(document).on('click', '#actualizarEmpresa', actualizarEmpresa);

	//Funcion que actualiza una profesion
		$(document).on('click', '#actualizarProfesion', actualizarProfesion);

	//Funcion que actualiza un tipo de programa
		$(document).on('click', '#actualizarPrograma', actualizarPrograma);

	//Funcion que actualiza un tipo de programa
		$(document).on('click', '#actualizarTipoVinculacion', actualizarTipoVinculacion);

	//Funcion que actualiza un tipo de programa
		$(document).on('click', '#actualizarTipoSoporte', actualizarTipoSoporte);

	//Funcion que actualiza un tipo de dccumento
		$(document).on('click', '#actualizarTipoDocumento', actualizarTipoDocumento);

	//Funcion que actualiza un usuario
		$(document).on('click', '#actualizarUsuario', actualizarUsuario);

	//Funcion que actualiza una vinculacion
		$(document).on('click', '#actualizarVinculacion', actualizarVinculacion);

	//Funcion que actualiza la clave de un usuario
		$(document).on('click', '#actualizarClave', actualizarClave);

	//Funcion que reestablece la clave de un usuario
		$(document).on('click', '.btnRestablecerClave', void_RestablecerClave);

	//Funcion que desvincula a una persona
		$(document).on('click', '#desvincular', desvincular);

	//Funcion que actualiza una hoja de vida
		$(document).on('click', '#actualizarHojaVida', actualizarHojaVida);

	//Funcion que actualiza los soportes de una persona al actualizar
		$(document).on('click', '#subirSoporte', subirSoporte);
});
/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/
/*°°°°°°°°°°|	FUNCIONES							|°°°°°°°°°°°°°°°*/
/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/

function estadoUsuario(){
	elemento  = $(this);
	idUsuario = elemento.parents("tr").data('usuario');
	elemento.checkbox("is checked") ? activo = 1 : activo = 2;

		$.post(baseurl+'index.php/usuarioC/cambiarEstado', {activo: activo,idUsuario:idUsuario}, function(data, textStatus, xhr) {
		
	});
}


function estadoArea(){
	elemento = $(this);
	idArea   = elemento.parents("tr").data('area');
	elemento.checkbox("is checked") ? activo = 1 : activo = 2;

		$.post(baseurl+'index.php/areaC/cambiarEstado', {activo: activo,idArea:idArea}, function(data, textStatus, xhr) {
		
	});
}

function estadoEmpresa(){
	elemento  = $(this);
	idEmpresa = elemento.parents("tr").data('empresa');
	elemento.checkbox("is checked") ? activo = 1 : activo = 2;

		$.post(baseurl+'index.php/empresaC/cambiarEstado', {activo: activo,idEmpresa:idEmpresa}, function(data, textStatus, xhr) {
		
	});
}

function estadoCargo(){
	elemento = $(this);
	idCargo  = elemento.parents("tr").data('cargo');
	elemento.checkbox("is checked") ? activo = 1 : activo = 2;

		$.post(baseurl+'index.php/cargoC/cambiarEstado', {activo: activo,idCargo:idCargo}, function(data, textStatus, xhr) {
		
	});
}

function estadoProfesion(){
	elemento    = $(this);
	idProfesion = elemento.parents("tr").data('profesion');
	elemento.checkbox("is checked") ? activo = 1 : activo = 2;

		$.post(baseurl+'index.php/profesionC/cambiarEstado', {activo: activo,idProfesion:idProfesion}, function(data, textStatus, xhr) {
		
	});
}

function estadoVinculacion(){
	elemento          = $(this);
	idDatoVinculacion = elemento.parents("tr").data('vinculacion');
	elemento.checkbox("is checked") ? activo = 1 : activo = 2;

		$.post(baseurl+'index.php/vinculacionC/cambiarEstado', {activo: activo,idDatoVinculacion:idDatoVinculacion}, function(data, textStatus, xhr) {
		
	});
}

function estadoPrograma(){
	elemento       = $(this);
	idTipoPrograma = elemento.parents("tr").data('programa');
	elemento.checkbox("is checked") ? activo = 1 : activo = 2;

		$.post(baseurl+'index.php/programaC/cambiarEstado', {activo: activo,idTipoPrograma:idTipoPrograma}, function(data, textStatus, xhr) {
		
	});
}

function estadoTipoVinculacion(){
	elemento          = $(this);
	idTipoVinculacion = elemento.parents("tr").data('tipovinculacion');
	elemento.checkbox("is checked") ? activo = 1 : activo = 2;

		$.post(baseurl+'index.php/tipovinculacionC/cambiarEstado', {activo: activo,idTipoVinculacion:idTipoVinculacion}, function(data, textStatus, xhr) {
		
	});
}

function estadoTipoSoporte(){
	elemento      = $(this);
	idTipoSoporte = elemento.parents("tr").data('tsoporte');
	elemento.checkbox("is checked") ? activo = 1 : activo = 2;

		$.post(baseurl+'index.php/tipoSopC/cambiarEstado', {activo: activo,idTipoSoporte:idTipoSoporte}, function(data, textStatus, xhr) {
	});
}

function  consultaHojasVida() {
	hojadevida = $("#busqueda").val()
	tipo       = $("#estado").dropdown("get value")
	elem       = $(this)
	
	$.post(baseurl+'index.php/hojadevidaC/consultar', {hojadevida: hojadevida,tipo:tipo}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
}

function  consultaPersona() {
	persona = $("#busqueda").val()
	elem    = $(this)

	$.post(baseurl+'index.php/personaC/consultar', {persona: persona,}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
}

function  consultaPrograma() {
	$programa = $("#busqueda").val()
	$tipo     = $("#estado").dropdown("get value")
	elem      = $(this)

	$.post(baseurl+'index.php/programaC/consultar', {programa: $programa,tipo: $tipo}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
}

function  consultaTipoVinculacion() {
	$vinculacion = $("#busqueda").val()
	$tipo        = $("#estado").dropdown("get value")
	elem         = $(this)

	$.post(baseurl+'index.php/tipovinculacionC/consultar', {vinculacion: $vinculacion,tipo: $tipo}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
}

function  consultaVinculacion() {
	$vinculacion = $("#busqueda").val()
	$tipo        = $("#estado").dropdown("get value")
	elem         = $(this)

	$.post(baseurl+'index.php/vinculacionC/consultar', {vinculacion: $vinculacion,tipo: $tipo}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
}

function consultaSoporte(){
	$tsoporte = $("#busqueda").val()
	$tipo     = $("#estado").dropdown("get value")
	elem      = $(this)

	$.post(baseurl+'index.php/tipoSopC/consultar', {tsoporte: $tsoporte,tipo: $tipo}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
}

function consultaDocumento(){
	tdocumento = $("#busqueda").val()
	elem       = $(this)
	$.post(baseurl+'index.php/tipoDocC/consultar', {tdocumento: tdocumento}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
}
 
function subirSoporte(){
				string_subirArchivo("#form_soporte",function(){ 
					documento = $.trim($("#documentoActualizar").text());
					$.post(baseurl+'index.php/uploadC/actualizarTablaSoporte', {documento:documento}, function(data, textStatus, xhr) {
					$("#form_soporte input:not(.txt_documento),#form_soporte textarea,#form_soporte select,#form_soporte .dropdown").each(borrarCampo);
					$("#tablaSoportes").html(data)
				});
			})
}

function agregaExpForm () {

	valida            = true;
	var empresa       = $("#empresa").dropdown("get value");
	var empresaNombre = $("#empresa").dropdown("get text");
	var cargo         = $("#cargo").dropdown("get value");
	var cargoNombre   = $("#cargo").dropdown("get text");
	var fechaI        = $("#fechaI").val();
	var fechaF        = $("#fechaF").val();
	var jefe          = $("#jefe").val();
	var tel           = $("#tel").val();
	var inf           = $("#inf").val();
	tabla             = $("#tablaExp");
	cuerpo            = $("#filaExp");

	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
	}

	tablaExp == 0 ?  tabla.show("fast"): false;
mensaje = "	<tr> \
				<td data-valor="+empresa+" >"+empresaNombre+"<td> \
				<td data-valor="+cargo+">"+cargoNombre+"</td> \
				<td>"+fechaI+"</td> \
				<td>"+fechaF+"</td> \
				<td>"+jefe+"</td> \
				<td class='CTelefono'>"+tel+"</td> \
				<td>"+inf+"</td> \
				<td> \
					<div class='ui remover icon button red'> \
					  <i class='remove icon'></i> \
					</div> \
				</td> \
	    	</tr>	";
	cuerpo.append(mensaje);
	$(".experiencia").each(borrarCampo);
}

function soportes () {

	var soporteTipo       = $("#soporteTipo").dropdown("get value");
	var soporteTipoNombre = $("#soporteTipo").dropdown("get text");
	var observacion       = $("#observacionFile").val();
	tabla                 = $("#tablaAnexo");
	cuerpo                = $("#filaAnexo");

	valida = true;
	$('.requerido1').each(validaVacio);
		if (!valida) {
			return false;
	}

var mensaje = "<form class='form_soporte'><div class='field'>\
			    <div class='ui action input'>\
			        <input type='text' id='_soporte"+contadorArchivos+"' readonly='true' placeholder='solo archivos pdf, word o excel y maximo 1mb de tamaño'>\
			        <label for='soporte"+contadorArchivos+"' class='ui icon button teal btn-file' data-content='hola' >\
			             <i class='upload icon'></i>\
			             <input type='file' id='soporte"+contadorArchivos+"' name='archivo' style='display: none'>\
							<input type='hidden' name='tipo'  value='"+soporteTipo+"' >\
							<input type='hidden' name='documento' class='txt_documento'>\
							<input type='hidden' name='descripcion' value='"+observacion+"'>\
			        </label>\
			    </div>\
			</div>  \
		</form>\
";
mensaje = "<tr>\
			 <td colspan='2'>"+soporteTipoNombre+"</td>\
			 <td >"+observacion+"</td>\
			 <td>"+mensaje+"</td>\
			 <td> \
					<div class='ui remover icon button red'> \
					  <i class='remove icon'></i> \
					</div> \
				</td> \
     		</tr>";
		cuerpo.append(mensaje);
		tabla.show()
		contadorArchivos = contadorArchivos+1;
		$(".certificado").each(borrarCampo);
	}


function borrarFila () {
	$(this).parent().parent().remove();
}

function validarTipoDato () {
	elemento = $(this);

	if(elemento.val()==0 || elemento.val() =="")
	{
	return false;
	}

	tipo   = $.trim(elemento.data("tipo"))
	minimo = $.trim(elemento.data("minimo"))
	maximo = $.trim(elemento.data("maximo"))

	//console.log(minimo);

	if (tipo == "numero") {
		if (!/^([0-9])*$/.test(elemento.val())) {
			$(this).parent().append(string_mensaje("Este campo solo puede llevar numeros!"));
			$(this).focus();
			 valida= false;
		}
	}

	if (tipo == "texto") {
		if (!/^([a-zA-Z ñáéíóúÑÁÉÍÓÚ]{1,200})$/i.test(elemento.val())) {
			$(this).parent().append(string_mensaje("Este campo solo puede llevar letras!"));
			$(this).focus();
			 valida= false;
		}
	}

	if ( minimo != "" && minimo > elemento.val().length) {
			$(this).parent().append(string_mensaje("Este campo no cumple con el minimo de "+minimo+" digitos!"));
			$(this).focus();
			 valida= false;
	}
	if ( maximo != "" && maximo < elemento.val().length) {
			$(this).parent().append(string_mensaje("Este campo contiene mas de "+maximo+" digitos!"));
			$(this).focus();
			 valida= false;
	}

	if (!valida) {
		return false;
	}

}



/*funcion para guardar las hojas de vida*/

function guardarHojaVida () {
	$(".message").remove();
	valida = true;
	//console.log('Entrando a guardar hoja de vida');
	var documento =   $("#documento");
	if (documento.next("button").hasClass('red')) {
		$("#documento").parents(".field").append(string_mensaje("Este usuario ya esta registrado"))
		return false;
	}
	if (!documento.next("button").hasClass('green')) {
		$("#documento").parents(".field").append(string_mensaje("No ha ingresado ningun documento"))
		return false;
	}

	$('.required.validar input,.required.validar .dropdown').each(validaVacio);
	if (!valida) {	return false;}


	$('input').each(validarTipoDato);
		if (!valida) {return false;	}
		console.log('valildacion hecha exitosamente');

	// INFORMACION GENERAL
	var documento       =   $("#documento").val();
	var tipoDocumento   =  $("#tipoDocumento").dropdown("get value");
	var nombre          =   $("#nombre").val();
	var PrimerApellido  =   $("#PrimerApellido").val();
	var email           =   $("#email").val();
	var SegundoApellido =   $("#SegundoApellido").val();
	var TipoGenero      =  $("#TipoGenero").dropdown("get value");
	
	
	// INFORMACION PERSONAL
	var telefono        =   $("#telefono").val();
	var celular         =   $("#celular").val();
	var direccion       =   $("#direccion").val();
	var profesion       =   $("#profesion").dropdown("get value");
	var cargo           =  $("#cargoId").dropdown("get value");

	// INFORMACION EXPERIENCIA LABORAL
	var datos =  document.getElementById("filaExp").getElementsByTagName("tr");

	var empresaId           = new Array();
	var cargoOcupo          = new Array();
	var fechaIngreso        = new Array();
	var fechaTermino        = new Array();
	var nombreJefeInmediato = new Array();
	var TelefonoEmpresa     = new Array();
	var observacionTareas   = new Array();

for (var i = 0; i < datos.length; i++) {
	var Emp = datos[i].childNodes[1].getAttribute("data-valor");
	empresaId.push(Emp);
	var Car = datos[i].childNodes[3].getAttribute("data-valor");
	cargoOcupo.push(Car);
	var Finici = datos[i].childNodes[5].innerHTML;
	fechaIngreso.push(Finici);
	var Ffi = datos[i].childNodes[7].innerHTML;
	fechaTermino.push(Ffi);
	var Jef = datos[i].childNodes[9].innerHTML;
	nombreJefeInmediato.push(Jef);
	var Telefon = datos[i].childNodes[11].innerHTML;
	TelefonoEmpresa.push(Telefon);
	var Informacio = datos[i].childNodes[13].innerHTML;
	observacionTareas.push(Informacio);
}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere guardar esta hoja de vida?")) { return}
	$.post(baseurl+'index.php/hojadevidaC/ingresar', {fotoUsuario:fotoUsuario,email:email,telefono:telefono,celular:celular,direccion:direccion,profesion:profesion,cargo:cargo,documento:documento,tipoDocumento:tipoDocumento, PrimerApellido: PrimerApellido,SegundoApellido:SegundoApellido,TipoGenero:TipoGenero,nombre:nombre,empresaId:empresaId,cargoOcupo:cargoOcupo,fechaIngreso:fechaIngreso,fechaTermino:fechaTermino,nombreJefeInmediato:nombreJefeInmediato,TelefonoEmpresa:TelefonoEmpresa,observacionTareas:observacionTareas
	}, function(data, textStatus, xhr) {

		//Mensaje que muestra cuando se guarda exitosamente una hoja de vida sin experiencia ni soportes


		//Documento
		$(".txt_documento").val(documento);
		if ($(".form_soporte").length == 0) {
					$("input,textarea,select,.dropdown").each(borrarCampo);
							cuerpo = $("#mensajeHoja");
							mensaje="<div class='ui positive message'> \
										<i id='cerrar' class='close icon'></i> \
										<p>"+"Hoja de vida Guardada exitosamente"+"</p> \
									</div>";
					cuerpo.append(mensaje);
					$("tbody tr").remove();
					$(".checkmark.icon").parent().addClass('red').removeClass("green");
					$(".checkmark.icon").addClass('remove').removeClass("checkmark");
					$("#imagen").prop("src",baseurl+"publico/img/esteban.png")
            		fotoUsuario = "";

		}
		//Mensaje que muestra cuando se guarda exitosamente una hoja de vida con experiencia y soportes
		$(".form_soporte").each(function(index, el) {
			string_subirArchivo ($(this),function(){
				contadorSubidos = contadorSubidos+1;
				totalRestantes = contadorArchivos-contadorSubidos;
				if (totalRestantes === 0) {
					$("input,textarea,select,.dropdown").each(borrarCampo);
							cuerpo = $("#mensajeHoja");
							mensaje="<div class='ui positive message'> \
										<i id='cerrar' class='close icon'></i> \
										<p>"+"Hoja de vida Guardada exitosamente"+"</p> \
									</div>";
					cuerpo.append(mensaje);


					$("tbody tr").remove();
					$(".checkmark.icon").parent().addClass('red').removeClass("green");
					$(".checkmark.icon").addClass('remove').removeClass("checkmark");
					$("#imagen").prop("src",baseurl+"publico/img/esteban.png")
             		fotoUsuario = "";

				}
			})
		});

	});

}

function guardarArea(){
	$(".message").remove();
	var nombreArea =   $("#nombreArea").val();
	var estadoId   = 1;

	valida = true;
	$('#formularioAreas .requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	$('#formularioAreas input').each(validarTipoDato);
		if (!valida) {return false;	}


	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere guardar esta area?")) { return}
	$.post(baseurl+'index.php/areaC/ingresar', {nombreArea:nombreArea,estadoId:estadoId
	}, function(data, textStatus, xhr) {

	cuerpo = $("#mensajeArea");
	var mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			<p>"+"Guardado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);
		limpiar();
	});

}

function guardarEmpresa(){
	$(".message").remove();
	var nombreEmpresa    = $("#nombreEmpresa").val();
	var direccionEmpresa = $("#direccion").val();
	var nit              = $("#nit").val();
	var estadoId         = 1;

	valida = true;
	$('#formularioEmpresa .requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	$('input').each(validarTipoDato);
		if (!valida) {return false;	}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere guardar esta empresa?")) { return}
	$.post(baseurl+'index.php/empresaC/ingresar', {nombreEmpresa:nombreEmpresa,direccionEmpresa:direccionEmpresa,nit:nit,estadoId:estadoId
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeEmpresa");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			<p>"+"Guardado exitosamente"+"</p> \
			</div>";
			cuerpo.append(mensaje);
			limpiar();
	});
}

function limpiar(){
	$('form').form('clear');
}

function guardarCargo(){
	$(".message").remove();
	var nombreCargo =  $("#nombreCargo").val();
	var estadoId    = 1;

	valida = true;
	$('#formularioCargo .requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	$('#formularioCargo input').each(validarTipoDato);
		if (!valida) {return false;	}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere guardar este cargo?")) { return}
	$.post(baseurl+'index.php/cargoC/ingresar', {nombreCargo:nombreCargo,estadoId:estadoId
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeCargo");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			<p>"+"Guardado exitosamente"+"</p> \
		</div>";
		cuerpo.append(mensaje);
		limpiar();
	});
}

function guardarUsuario(){

	$(".message").remove();
	var documentoUsuario =   $("#documentoUsuario");
	if (documentoUsuario.next("button").hasClass('red')) {
		$("#documentoUsuario").parents(".field").append(string_mensaje("Este usuario ya esta registrado"))
		return false;
	}
	if (!documentoUsuario.next("button").hasClass('green')) {
		$("#documentoUsuario").parents(".field").append(string_mensaje("No ha ingresado ningun documento"))
		return false;
	}

	$('input').each(validarTipoDato);
		if (!valida) {return false;	}

	$('.required input').each(validaVacio);
	if (!valida) {	return false;}


	//nombreUsuario, areaId, documentoUsuario, password, rolId, estadoId, cargoId

	var nombreUsuario    = $("#nombreUsuario").val();
	var areaId           = $("#areaId").dropdown("get value");
	var password         =  $("#password").val();
	var documentoUsuario = $("#documentoUsuario").val();
	var rolId            = $("#rolId").dropdown("get value");
	var cargoId          = $("#cargoId").dropdown("get value");
	var estadoId         = 1;

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere guardar este usuario?")) { return}
	$.post(baseurl+'index.php/usuarioC/ingresar', {nombreUsuario:nombreUsuario,areaId:areaId,password:password,documentoUsuario:documentoUsuario,rolId:rolId,estadoId:estadoId,cargoId:cargoId
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeUsuario");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			<p>"+"Guardado exitosamente"+"</p> \
		</div>";
		cuerpo.append(mensaje);

		$("input,textarea,select,.dropdown").each(borrarCampo);
		$(".checkmark.icon").parent().addClass('red').removeClass("green");
		$(".checkmark.icon").addClass('remove').removeClass("checkmark");
		
	});
}

function guardarProfesion(){
	$(".message").remove();
	valida              = true;
	var nombreProfesion =  $("#nombreProfesion").val();
	var estadoId        = 1;

	$('input').each(validarTipoDato);
		if (!valida) {return false;	}

	$('#formularioProfesion .requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere guardar esta profesion?")) { return}
	$.post(baseurl+'index.php/profesionC/ingresar', {nombreProfesion:nombreProfesion,estadoId:estadoId
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeProfesion");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			<p>"+"Guardado exitosamente"+"</p> \
		</div>";
		cuerpo.append(mensaje);
		limpiar();
	});
}


function guardarPrograma(){
	$(".message").remove();
	var nombreTipoPrograma =   $("#nombreTipoPrograma").val();
	var estadoId           = 1;

	$('input').each(validarTipoDato);
		if (!valida) {return false;	}

	valida = true;
	$('#formularioPrograma .requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere guardar este programa?")) { return}
	$.post(baseurl+'index.php/programaC/ingresar', {nombreTipoPrograma:nombreTipoPrograma,estadoId:estadoId
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajePrograma");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			<p>"+"Guardado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);
		limpiar();
	});
}

function guardarTipoVinculacion(){
	$(".message").remove();
	var nombreTipoVinculacion =   $("#nombreTipoVinculacion").val();
	var estadoId              = 1;

	$('input').each(validarTipoDato);
		if (!valida) {return false;	}

	valida = true;
	$('#formularioTipoVinculacion .requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere guardar este tipo de vinculacion?")) { return}
	$.post(baseurl+'index.php/tipovinculacionC/ingresar', {nombreTipoVinculacion:nombreTipoVinculacion,estadoId:estadoId
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeTipoVinculacion");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			<p>"+"Guardado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);
		limpiar();
	});
}

function guardarVinculacion(){
	valida = true;
	$(".message").remove();
	var documentoVinculacion =   $(this).data("documento");
	$('input').each(validarTipoDato);
		if (!valida) {return false;	}

	var documento              =  $(this).data("valor");
	var cargo                  =   $("#cargoId").dropdown("get value");
	var tipoDePrograma         =   $("#tipoDePrograma").dropdown("get value");
	var tipoVinculacion        =   $("#tipoVinculacion").dropdown("get value");
	var sueldo                 =   $("#sueldo").val();
	var cuentaBancaria         =   $("#cuentaBancaria").val();
	var fechaIngreso           =   $("#fechaIngreso").val();
	var fechaTermino           =   $("#fechaTermino").val();
	var calificacion           =   $("#calificacion").val();
	var eps                    =   $("#eps").val();
	var fondoEmpleado          =   $("#fondoEmpleado").val();
	var observacionVinculacion =  $("#observacionVinculacion").val();
	var estadoId               = 1;

	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}


	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere vincular esta persona?")) { return}
	$.post(baseurl+'index.php/vinculacionC/ingresar', {fondoEmpleado:fondoEmpleado,eps:eps,documento:documento,cargoId:cargo,tipoDePrograma:tipoDePrograma,tipoVinculacion:tipoVinculacion,sueldo:sueldo,fechaIngreso:fechaIngreso,fechaTermino:fechaTermino,calificacion:calificacion,observacionVinculacion:observacionVinculacion,estadoId:estadoId,cuentaBancaria:cuentaBancaria
	}, function(data, textStatus, xhr) {
		//Recarga la pagina
	 		window.location.reload();
	});
}


function guardarTipoSoporte(){
	$(".message").remove();
	valida            = true;
	var nombreSoporte =   $("#nombreSoporte").val();
	var estadoId      = 1;

	$('input').each(validarTipoDato);
		if (!valida) {return false;	}


	$('#formularioSoporte .requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere guardar este tipo de soporte?")) { return}
	$.post(baseurl+'index.php/tipoSopC/ingresar', {nombreSoporte:nombreSoporte,estadoId:estadoId
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeTipoSoporte");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			<p>"+"Guardado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);
		limpiar();
	});
}

function guardarTipoDocumento(){
	$(".message").remove();
	var nombreTipoDocumento =   $("#nombreTipoDocumento").val();

	valida = true;
	$('#formularioTipoDoc .requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere guardar este tipo de documento?")) { return}
	$.post(baseurl+'index.php/tipoDocC/ingresar', {nombreTipoDocumento:nombreTipoDocumento
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeTipoDocumento");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Guardado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);
		limpiar();

	});
}

function cerrar(){
  	$(this).closest('.message').fadeOut();
}

function validarExistenciaPersona () {
	elemento = $(this);
	boton    = elemento.next("button");
	boton.removeClass('red').removeClass('green')
	icono    = boton.children('i');
	icono.removeClass('checkmark').removeClass('remove').removeClass('refresh')
	$.post(baseurl+'index.php/usuarioC/verificarPersona',{usuario:elemento.val()}, function(data, textStatus, xhr) {
		console.log(data);
		data ==1 ?  boton.addClass('red'): boton.addClass('green');
		data ==1 ?  icono.addClass('remove'): icono.addClass('checkmark');
	});
}

function validarExistenciaUsuario() {
	elemento = $(this);
	boton    = elemento.next("button");
	boton.removeClass('red').removeClass('green')
	icono    = boton.children('i');
	icono.removeClass('checkmark').removeClass('remove').removeClass('refresh')
	$.post(baseurl+'index.php/usuarioC/verificarUsuario',{documentoUsuario:elemento.val()}, function(data, textStatus, xhr) {
		console.log(data);
		data ==1 ?  boton.addClass('red'): boton.addClass('green');
		data ==1 ?  icono.addClass('remove'): icono.addClass('checkmark');
	});
}

function validarVinculacion() {
	elemento = $(this);
	boton    = elemento.next("button");
	boton.removeClass('red').removeClass('green')
	icono    = boton.children('i');
	icono.removeClass('checkmark').removeClass('remove').removeClass('refresh')
	$.post(baseurl+'index.php/vinculacionC/verificarVinculacion',{documentoVinculacion:elemento.val()}, function(data, textStatus, xhr) {
		console.log(data);
		data ==1 ?  boton.addClass('red'): boton.addClass('green');
		data ==1 ?  icono.addClass('remove'): icono.addClass('checkmark');
	});
}

function cargarArea(){
	valida = true;
	$('.requerido1').each(validaVacio);
		if (!valida) {
			return false;
		}

	area = $("#busqueda").val()
	elem = $(this)
	$.post(baseurl+'index.php/areaC/consultar1', {area: area,}, function(data, textStatus, xhr) {
		$("#respuesta").html(data)
	});
}

function actualizarArea()
{
	$(".message").remove();
	var nombreArea =  $("#nombreArea").val();
	var idArea     =  $("#nombreArea").data("valor");

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere actualizar esta area?")) { return}
	$.post(baseurl+'index.php/areaC/actualizar', {nombreArea:nombreArea,idArea:idArea
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeArea");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Actualizado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);

	});
}


function actualizarCargo()
{
	$(".message").remove();
	var nombreCargo =  $("#nombreCargo").val();
	var idCargo     =  $("#idCargo").val();

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere actualizar este cargo?")) { return}
	$.post(baseurl+'index.php/cargoC/actualizar', {nombreCargo:nombreCargo,idCargo:idCargo
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeCargo");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Actualizado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);

	});
}

function actualizarUsuario()
{

	$(".message").remove();

	var documentoUsuario =  $("#documentoUsuario").val();
	var nombreUsuario    =  $("#nombreUsuario").val();
	var rolId            = $("#rolId").val()
	var areaId           = $("#areaId").val()
	var cargoId          = $("#cargoId").val()
	

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere actualizar este usuario?")) { return}
	$.post(baseurl+'index.php/usuarioC/actualizar', {documentoUsuario:documentoUsuario,nombreUsuario:nombreUsuario,rolId:rolId,areaId:areaId,cargoId:cargoId
	}, function(data, textStatus, xhr) {

		console.log("Actualizado usuario");

		cuerpo = $("#mensajeUsuario");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Actualizado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);

	});
}

function actualizarEmpresa()
{
	$(".message").remove();
	var nombreEmpresa =  $("#nombreEmpresa").val();
	var nit           =  $("#nit").val();
	var direccion     =  $("#direccion").val();
	var idEmpresa     =  $("#idEmpresa").val();

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere actualizar esta empresa?")) { return}
	$.post(baseurl+'index.php/empresaC/actualizar', {nombreEmpresa:nombreEmpresa,idEmpresa:idEmpresa,nit:nit,direccionEmpresa:direccion
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeEmpresa");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Actualizado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);

	});
}

function actualizarProfesion()
{
	$(".message").remove();
	var nombreProfesion =  $("#nombreProfesion").val();
	var idProfesion     =  $("#idProfesion").val();

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere actualizar esta profesion?")) { return}
	$.post(baseurl+'index.php/profesionC/actualizar', {nombreProfesion:nombreProfesion,idProfesion:idProfesion
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeProfesion");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Actualizado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);

	});
}

function actualizarPrograma()
{
	$(".message").remove();
	var nombreTipoPrograma =  $("#nombreTipoPrograma").val();
	var idTipoPrograma     =  $("#idTipoPrograma").val();

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere actualizar este programa?")) { return}
	$.post(baseurl+'index.php/programaC/actualizar', {nombreTipoPrograma:nombreTipoPrograma,idTipoPrograma:idTipoPrograma
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajePrograma");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Actualizado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);

	});
}

function actualizarTipoVinculacion()
{
	$(".message").remove();
	var nombreTipoVinculacion =  $("#nombreTipoVinculacion").val();
	var idTipoVinculacion     =  $("#idTipoVinculacion").val();

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere actualizar este tipo de vinculacion?")) { return}
	$.post(baseurl+'index.php/tipovinculacionC/actualizar', {nombreTipoVinculacion:nombreTipoVinculacion,idTipoVinculacion:idTipoVinculacion
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeVinculacion");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Actualizado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);

	});
}

function actualizarTipoSoporte()
{
	$(".message").remove();
	var nombreTipoSoporte =  $("#nombreTipoSoporte").val();
	var idTipoSoporte     =  $("#idTipoSoporte").val();

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere actualizar este tipo de soporte?")) { return}
	$.post(baseurl+'index.php/tipoSopC/actualizar', {nombreTipoSoporte:nombreTipoSoporte,idTipoSoporte:idTipoSoporte
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeTipoSoporte");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Actualizado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);

	});
}

function actualizarTipoDocumento()
{
	$(".message").remove();
	var nombreTipoDocumento =  $("#nombreTipoDocumento").val();
	var idTipoDocumento     =  $("#idTipoDocumento").val();

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere actualizar este tipo de documento?")) { return}
	$.post(baseurl+'index.php/tipoDocC/actualizar', {nombreTipoDocumento:nombreTipoDocumento,idTipoDocumento:idTipoDocumento
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeTipoDocumento");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Actualizado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);

	});
}


function actualizarVinculacion()
{
	$(".message").remove();
	elemento                   = $(this);
	idVinculaion               = elemento.data("valor");
	var cargo                  =   $("#cargoId").val()
	var tipoDePrograma         =   $("#tipoDePrograma").val()
	var tipoVinculacion        =   $("#tipoVinculacion").val()
	var sueldo                 =   $("#sueldo").val();
	var fechaIngreso           =   $("#fechaIngreso").val();
	var fechaTermino           =   $("#fechaTermino").val();
	var calificacion           =   $("#calificacion").val();
	var observacionVinculacion =  $("#observacionVinculacion").val();

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere actualizar?")) { return}
	$.post(baseurl+'index.php/vinculacionC/actualizar', {idVinculaion:idVinculaion,cargo:cargo,tipoDePrograma:tipoDePrograma,tipoVinculacion:tipoVinculacion,sueldo:sueldo,fechaIngreso:fechaIngreso,fechaTermino:fechaTermino,calificacion:calificacion,observacionVinculacion:observacionVinculacion
	}, function(data, textStatus, xhr) {

		cuerpo = $("#mensajeVinculacion");
		mensaje="<div class='ui positive message'> \
			<i id='cerrar' class='close icon'></i> \
			  <p>"+"Actualizado exitosamente"+"</p> \
			</div>";
		cuerpo.append(mensaje);

	});
}

function actualizarClave(){
	$(".message").remove();
	var claveAnterior  =   $("#claveAnterior")
	var nuevaClave     =   $("#nuevaClave")
	var confirmarClave =   $("#confirmarClave")

	valida = true;
	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

		console.log('test');

	if (nuevaClave.val()!==confirmarClave.val()) {
		confirmarClave.parent().append(string_mensaje("No coincide su nueva clave y la confirmacion de la nueva clave"))
		return
	}

	if (!confirm("Esta seguro que quiere actualizar?")) { return}
	$.post(baseurl+'index.php/usuarioC/cambiarClave', {claveAnterior:claveAnterior.val(),nuevaClave:nuevaClave.val(),confirmarClave:confirmarClave.val()
	}, function(data, textStatus, xhr) {
		if (data==0) {
			claveAnterior.parent().append(string_mensaje("Su clave anterior es incorrecta"))
		}
		else{
			$(".segment").append(string_mensaje("Su clave ha sido actualizada correctamente","positive"))
		}
		$("input,textarea,select,.dropdown").each(borrarCampo);
	});

}

function void_RestablecerClave(){
	elemento = $(this);
	usuario  = elemento.parents("tr").data('usuario');
	if (!confirm("Esta seguro que quiere reestablecer la clave de este usuario??")) { return}
	$.post(baseurl+'index.php/usuarioC/restablecerClave', {usuario:usuario
	}, function(data, textStatus, xhr) {
		alert("La clave ha sido reestablecida como 123")
		});
}

function desvincular(){
	$(".message").remove();
	valida                  = true;
	elemento                = $(this);
	idVinculaion            = elemento.data("valor");
	documento               = elemento.data("documento");
	var fechaDesvinculacion =   $("#fechaDesvinculacion").val();

	$('.requerido').each(validaVacio);
		if (!valida) {
			return false;
		}

	var razon =   $("#razon").val();
	var detalle =   $("#observacion").val();

	// GENERAR CONSULTA
	if (!confirm("Esta seguro que quiere desvincular esta persona?")) { return}
	$.post(baseurl+'index.php/vinculacionC/desvincular', {fechaDesvinculacion:fechaDesvinculacion,razon:razon,detalle:detalle,idVinculaion:idVinculaion,documento:documento
	}, function(data, textStatus, xhr) {

		alert("Desvinculado exitosamente!");
		window.location.reload();
	});
}

function actualizarHojaVida () {
	$(".message").remove();
	valida = true;

	// INFORMACION GENERAL
	var documento       =   $.trim($("#documentoActualizar").text());
	var nombre          =   $("#nombre").val();
	var PrimerApellido  =   $("#PrimerApellido").val();
	var SegundoApellido =   $("#SegundoApellido").val();
	
	
	// INFORMACION PERSONAL
	var telefono        =   $("#telefono").val();
	var celular         =   $("#celular").val();
	var direccion       =   $("#direccion").val();
	var profesion       =   $("#profesion").val();
	var cargo           =   $("#cargoId").val();

		// INFORMACION EXPERIENCIA LABORAL
	var datos =  document.getElementById("filaExp").getElementsByTagName("tr");

	var empresaId  = new Array();
	var cargoOcupo  = new Array();
	var fechaIngreso  = new Array();
	var fechaTermino  = new Array();
	var nombreJefeInmediato  = new Array();
	var TelefonoEmpresa  = new Array();
	var observacionTareas  = new Array();

for (var i = 0; i < datos.length; i++) {
	var Emp        = datos[i].childNodes[1].getAttribute("data-valor");
	empresaId.push(Emp);
	var Car        = datos[i].childNodes[3].getAttribute("data-valor");
	cargoOcupo.push(Car);
	var Finici     = datos[i].childNodes[5].innerHTML;
	fechaIngreso.push(Finici);
	var Ffi        = datos[i].childNodes[7].innerHTML;
	fechaTermino.push(Ffi);
	var Jef        = datos[i].childNodes[9].innerHTML;
	nombreJefeInmediato.push(Jef);
	var Telefon    = datos[i].childNodes[11].innerHTML;
	TelefonoEmpresa.push(Telefon);
	var Informacio = datos[i].childNodes[13].innerHTML;
	observacionTareas.push(Informacio);
}


	// GENERAR CONSULTA
	 if (!confirm("Esta seguro que quiere actualizar esta hoja de vida?")) { return}
	$.post(baseurl+'index.php/hojadevidaC/actualizar', {empresaId:empresaId,cargoOcupo:cargoOcupo,fechaIngreso:fechaIngreso,fechaTermino:fechaTermino,nombreJefeInmediato:nombreJefeInmediato,TelefonoEmpresa:TelefonoEmpresa,observacionTareas:observacionTareas,telefono:telefono,celular:celular,direccion:direccion,profesion:profesion,cargo:cargo,documento:documento,PrimerApellido:PrimerApellido,SegundoApellido:SegundoApellido,nombre:nombre
	}, function(data, textStatus, xhr) {

		//Mensaje que muestra cuando se guarda exitosamente una hoja de vida sin experiencia ni soportes
		cuerpo = $("#mensajeHoja");
				mensaje="<div class='ui positive message'> \
							<i id='cerrar' class='close icon'></i> \
							<p>"+"Hoja de vida Actualizada exitosamente"+"</p> \
						</div>";
		cuerpo.append(mensaje);
		$("#filaExp").html("");

	});

}