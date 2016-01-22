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
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Tipo de programa</th>
                        <th>Estado</th>
                        <th>Tipo de vinculacion</th>
                        <th>Sueldo</th>
                        <th>Fecha ingreso</th>
                        <th>Fecha termino</th>
                        <th>Calificacion obtenida</th>
                        <th>Observacion</th>
                    </tr>
                </thead>
                <tbody>
	                <?php foreach ($mivinculacion as $v): ?>	                  
	                    <tr>
	                        <td><?php echo $v->idDatoVinculacion ?></td>
	                        <td ><?php echo $v->documento ?></td>
	                        <td ><?php echo $v->nombreCompleto ?></td>
	                        <td ><?php echo $v->nombreCargo ?></td>
	                        <td ><?php echo $v->nombreTipoPrograma ?></td>
	                        <td ><?php echo $v->nombreEstado ?></td>
	                        <td ><?php echo $v->nombreTipoVinculacion ?></td>
	                        <td ><?php echo $v->sueldo ?></td>
	                        <td ><?php echo $v->fechaIngreso ?></td>
	                        <td ><?php echo $v->fechaTermino ?></td>
	                        <td ><?php echo $v->calificacion ?></td>
	                        <td ><?php echo $v->observacionVinculacion ?></td>
	                    </tr>
	                <?php endforeach ?>
                </tbody>
            </table>	       

</body>
</html>