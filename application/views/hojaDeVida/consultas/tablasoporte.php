<thead>
<tr>
  <th><i class="folder open outline icon"></i>Tipo de soporte</th>
  <th><i class="info icon"></i>Observación</th>
  <th><i class="download icon"></i> Descargar</th>
</tr>
</thead>
<tbody> 
<?php foreach ($soportes as $ar): ?>
	<tr>
		<td><?php echo $ar->nombreSoporte ?></td>
		<td><?php echo $ar->descripcion ?></td>
		<td><a class="ui button blue" target="descargar" href="<?php echo base_url() ?>index.php/uploadC/descargar/<?php echo $documento ?>/<?php echo $ar->idSoporte ?>">Descargar</a></td>
	</tr>
<?php endforeach ?>
</tbody>
