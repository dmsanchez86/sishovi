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
                        <th>Documento</th>
      					<th>Nombre</th>
     					<th>Fecha ingreso hoja de vida</th>
					    <th>Cargo al que aspira</th>
					    <th>Telefono</th>
					    <th>Celular</th>
					    <th>Direccion</th>
                    </tr>
                </thead>
                <tbody>
	                <?php foreach ($mihojadevida as $hv): ?>	                  
	                    <tr>
	                        <td><?php echo $hv->documento ?></td>
	                        <td ><?php echo $hv->nombreCompleto ?>&nbsp;<?php echo $hv->primerApellido ?></td>
	                        <td><?php echo $hv->fechaIngreso ?></td>
	                        <td ><?php echo $hv->nombreCargo ?></td>
	                        <td ><?php echo $hv->telefono ?></td>
	                        <td ><?php echo $hv->celular ?></td>
	                        <td ><?php echo $hv->direccion ?></td>
	                    </tr>
	                <?php endforeach ?>
                </tbody>
            </table>	       

</body>
</html>