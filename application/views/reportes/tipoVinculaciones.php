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
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
	                <?php foreach ($mivinculacion as $tv): ?>	                  
	                    <tr>
	                        <td><?php echo $tv->idTipoVinculacion ?></td>
	                        <td ><?php echo $tv->nombreTipoVinculacion ?></td>
	                        <td ><?php echo $tv->nombreEstado ?></td>
	                    </tr>
	                <?php endforeach ?>
                </tbody>
            </table>	       

</body>
</html>