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
                        <th>Nombre area</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
	                <?php foreach ($misoporte as $ts): ?>	                  
	                    <tr>
	                        <td><?php echo $ts->idSoporte ?></td>
	                        <td ><?php echo $ts->nombreSoporte ?></td>
	                        <td ><?php echo $ts->nombreEstado ?></td>
	                    </tr>
	                <?php endforeach ?>
                </tbody>
            </table>	       

</body>
</html>