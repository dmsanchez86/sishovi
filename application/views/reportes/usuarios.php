<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>publico/css/pdf.min.css">
</head>
<body>
	<img align="center" src="<?php echo base_url() ?>publico/img/logo.png">
	          <table class="ui small table">
                <thead>
                    <tr >
                        <th>documento</th>
                        <th>Nombre estado</th>
                        <th>Area</th>
                        <th>Cargo</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
	                <?php foreach ($miusuario as $u): ?>	                  
	                    <tr>
	                        <td><?php echo $u->documentoUsuario ?></td>
	                        <td ><?php echo $u->nombreEstado ?></td>
	                        <td><?php echo $u->nombreArea ?></td>
	                        <td ><?php echo $u->nombreCargo ?></td>
	                        <td ><?php echo $u->nombreRol ?></td>
	                    </tr>
	                <?php endforeach ?>
                </tbody>
            </table>	       

</body>
</html>