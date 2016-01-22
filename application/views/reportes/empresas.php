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
                        <th>Direccion</th>
                        <th>Nit</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
	                <?php foreach ($miempresa as $e): ?>	                  
	                    <tr>
	                        <td><?php echo $e->idEmpresa ?></td>
	                        <td ><?php echo $e->nombreEmpresa ?></td>
	                        <td ><?php echo $e->direccionEmpresa ?></td>
	                        <td ><?php echo $e->nit ?></td>
	                        <td ><?php echo $e->nombreEstado ?></td>
	                    </tr>
	                <?php endforeach ?>
                </tbody>
            </table>	       

</body>
</html>