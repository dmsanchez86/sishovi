var fileExtentionRange = '.pdf .doc .docx .xls .xlsx .ods .odt .png .jpeg .jpg';
var MAX_SIZE           = 1; // MB
var targetG            = "";
var fotoUsuario        = "";
$(document).on('change', '.btn-file :file:not(.foto)', function() {
    var input = $(this);
    targetG   = $(this).prop('id');
    if (navigator.appVersion.indexOf("MSIE") != -1) { // IE
        var label = input.val();
        input.trigger('fileselect', [ 1, label, 0 ]);
    } else {
        var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        var numFiles = input.get(0).files ? input.get(0).files.length : 1;
        var size = input.get(0).files[0].size;

        input.trigger('fileselect', [ numFiles, label, size ]);
    }
});

$(document).on('fileselect', '.btn-file :file:not(.foto)'  ,function(event, numFiles, label, size) {
    $('#'+targetG).attr('name', 'archivo'); // allow upload.
    var postfix = label.substr(label.lastIndexOf('.'));
    if (fileExtentionRange.indexOf(postfix.toLowerCase()) > -1) {
        if (size > 1024 * 1024 * MAX_SIZE ) {
            alert('Maximo tamaño ' + MAX_SIZE + ' MB.');

            $('#'+targetG).removeAttr('name'); // cancel upload file.
        } else {
            $('#_'+targetG).val(label);
        }
    } else {
        alert('Solo estan permitidos los tipos de archivo ' + fileExtentionRange);
        $('#'+targetG).removeAttr('name'); // cancel upload file.
    }
});

/*  Nombre Funcion: string_subirArchivo
    Descripción: funcion que sube un archivo al sistema
    param: s_elm,callback
    return: string
*/


function string_subirArchivo (s_elm,callback) {
         formulario  = $(s_elm)[0];
         var ruta    = baseurl+"index.php/uploadC/upload";
         // var data = new FormData($("form")[0]);
         var data    = new FormData(formulario);
       $.ajax({
               url: ruta,
               type: 'POST',
               data: data,
               contentType : false,
               processData : false,
    })
    .done(function(data)
    {   
        if (/ALERTA/.test(data)) 
            {   
             var error = data.split("[ALERTA]");
             callback(1,error[1]);
            }
        else
            {
             s_errorUploadG = "";
             callback(0,data);
            }
        
    })
}




// funciones para subir la foto del usuario al sistema
var tipoDeArchivo = '.png .jpeg .jpg';
var max_tamaño = 1; // MB

$(document).on('change', '.btn-file :file.foto', function() {
    var input = $(this);
    targetG = $(this).prop('id');
    if (navigator.appVersion.indexOf("MSIE") != -1) { // IE
        var label = input.val();
        input.trigger('fileselect', [ 1, label, 0 ]);
    } else {
        var label    = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        var numFiles = input.get(0).files ? input.get(0).files.length : 1;
        var size     = input.get(0).files[0].size;

        input.trigger('fileselect', [ numFiles, label, size ]);
    }
});

$(document).on('fileselect', '.btn-file :file.foto'  ,function(event, numFiles, label, size) {
    $('#'+targetG).attr('name', 'archivo'); // allow upload.
    var postfix = label.substr(label.lastIndexOf('.'));
    if (tipoDeArchivo.indexOf(postfix.toLowerCase()) > -1) {
        if (size > 1024 * 1024 * max_tamaño ) {
            alert('Maximo tamaño ' + max_tamaño + ' MB.');

            $('#'+targetG).removeAttr('name'); // cancel upload file.
        } else {
            $('#_'+targetG).val(label);
        }
    } else {
        alert('Solo estan permitidos los tipos de archivo ' + tipoDeArchivo);
        $('#'+targetG).removeAttr('name'); // cancel upload file.
    }
});


$(document).on('click',"#btnFoto",function(event) {
         $(".message").remove();
          formulario  = $("#formularioFoto")[0];
          var ruta    = baseurl+"index.php/hojadevidaC/foto";
          // var data = new FormData($("form")[0]);
          var data    = new FormData(formulario);
          
       $.ajax({
               url: ruta,
               type: 'POST',
               data: data,
               contentType : false,
               processData : false,
    })
    .done(function(data)
    {   
        if (/ALERTA/.test(data)) 
            {   
             var error = data.split("[ALERTA]");
             $("#formularioFoto").append(string_mensaje(error[1]))
            }
        else
            {
             $("#imagen").prop("src",baseurl+"fotosTemporal/"+data)
             fotoUsuario = data;
              $("#formularioFoto input.rutafoto").val(data);
            }
        
    })
    .fail(function(datos){
             $("#formularioFoto").append(string_mensaje(datos))
             $("#formularioFoto input.rutafoto").val("");
             fotoUsuario = "";


    })
});


$(document).on('click',"#borrarFoto",function(event) {
    $("#imagen").prop("src",baseurl+"publico/img/esteban.png")
    $("#_fotoUsuario").each(borrarCampo);
    fotoUsuario = "";
    $("#formularioFoto input.rutafoto").val("");
});