<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>publico/css/pdf.min.css">
</head>
<body>
	<img align="center" src="publico/img/logo.png">
	          <table class="ui small table">
                <thead>
                    <tr >
                        <th>id</th>
                        <th>Nombre area</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
	                <?php foreach ($miarea as $a): ?>	                  
	                    <tr>
	                        <td><?php echo $a->idArea ?></td>
	                        <td ><?php echo $a->nombreArea ?></td>
	                        <td ><?php echo $a->nombreEstado ?></td>
	                    </tr>
	                <?php endforeach ?>
                </tbody>
            </table>	       

</body>
</html>