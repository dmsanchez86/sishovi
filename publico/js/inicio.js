baseurl = $("#baseurl").text()

$(document).on('click', '#ingresarSistemaS', function(event) {
	event.preventDefault()
	Documento = $("#Documento").val()
	Contrasena = $("#Contrasena").val()
	elem = $(this)
	$.post(baseurl+'index.php/usuarioC/login', {usuDoc: Documento,clave:Contrasena}, function(data, textStatus, xhr) {
		mensaje = 'El usuario '+ Documento+' y la Contraseña no son correctos '
		data = $.trim(data);
		if ( data=="") {
			elem.parent().append(alerta("Hola","negative"));
		}
		else{
			elem.after(data);
		}
	});
});


function alerta (string_mensaje,color) {
	$("#mimensaje").remove();
	mensaje ='<div id="mimensaje" class="ui floating message '+color+'"><p>'+mensaje+'</p></div>';	
	return mensaje;
}