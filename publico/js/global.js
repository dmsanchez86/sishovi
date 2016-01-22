baseurl = $("#baseurl").text()
var FGenrico = "";
// funcion que genera un mensaje
function string_mensaje (texto,color) {
	$(".negative.message").remove()
	color = typeof color === "undefined" ? "negative" : color;
 var mensaje = "<div class='ui "+color+" message'> \
 			<i id='cerrar' class='close icon'></i> \
			<p>"+texto+"</p> \
			</div>";
return mensaje;
}

/*  Nombre Funcion: void_borrarCampo
	Descripción: borra el campo del valor seleccionado
	param: 
	return: 
*/
function borrarCampo () {
	elm = $(this);
	tipoElm = elm.prop('tagName');
	if ( tipoElm == "INPUT"){
		elm.val("");
		elm.text("");
	}

	if (tipoElm== "SELECT") {
		elm.val("0");
	}
	if (tipoElm== "TEXTAREA") {
		elm.val("");
	}
	if(elm.hasClass("dropdown")){
		elm.dropdown("restore defaults");
	}
}

function validaVacio (texto) {

	elemento = $(this);
	if(elemento.hasClass("dropdown")){
			if (elemento.dropdown("get value") <1) {
				elemento.parent().append(string_mensaje("Este campo es obligatorio"));
				elemento.focus();
			 valida= false;
			}
	}
	else{
			if (elemento.val()==0 || elemento.val() == "") {
				elemento.parent().append(string_mensaje("Este campo es obligatorio"));
				elemento.focus();

			 valida= false;
			}
	}
	if (!valida) {
		return false;
	}
}

$(".pop").popup();

// codigo para cargar las secciones dinamicas
$("body").on('click', '.modalGenerico', function(event) {
	elemento =  $(this);
	formulario = elemento.data("formulario");
	titulo = elemento.data("titulo");
	FGenrico = elemento.data("select");
	$.post(baseurl+'index.php/inicio/formularios',{formulario:formulario}, function(data, textStatus, xhr) {
		$(".modal.generico .content").html(data);
		$(".modal.generico .header").html(titulo);
		$(".modal.generico").modal({"closable":false}).modal('show');
	});
});


$("body").on('click', '.cerrarModalGenerico', function(event) {
	$.post(baseurl+'index.php/inicio/actualizarGenrico',{formulario:FGenrico}, function(data, textStatus, xhr) {
		$("#"+FGenrico).html(data);
	});
});